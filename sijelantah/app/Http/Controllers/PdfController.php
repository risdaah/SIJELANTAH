<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumpulan;
use App\Models\Insentif;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Carbon;
use App\Exports\ExportData;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengumpulanExport;


class PdfController extends Controller
{

    // Method untuk menghasilkan PDF
    public function generatePDFAll()
    {
        // Ambil semua data pengumpulan dengan relasi permintaan
        $pengumpulan = Pengumpulan::with('permintaan.pengguna')->get();

        // Array untuk menyimpan data yang akan dicetak di PDF
        $laporanPengumpulan = [];

        foreach ($pengumpulan as $item) {
            // Ambil insentif dari model Insentif berdasarkan ID_PERMINTAAN
            $insentif = Insentif::where('ID_PERMINTAAN', $item->ID_PERMINTAAN)->first();

            // Persiapkan data untuk laporan
            $laporanPengumpulan[] = [
                'ID_PERMINTAAN' => $item->ID_PERMINTAAN,
                'NAMA' => $item->permintaan->pengguna->NAMA,
                'NO_TELP' => $item->permintaan->pengguna->NO_TELP,
                'JUMLAH_KIRIM' => $item->JUMLAH_KIRIM,
                'ALAMAT_PERMINTAAN' => $item->permintaan->ALAMAT_PERMINTAAN,
                'TGL_KUMPUL' => $item->TGL_KUMPUL,
                'JUMLAH_INSENTIF' => $insentif ? $insentif->JUMLAH_INSENTIF : 0,
            ];
        }

        // Buat PDF menggunakan DomPDF dengan view LaporanPDF
        $pdf = PDF::loadView('LaporanPDF', compact('laporanPengumpulan'));

        // Mengirimkan file PDF untuk didownload
        return $pdf->download('laporan-pengumpulan.pdf');
    }

    public function generatePDF(Request $request)
    {
        // Ambil bulan dan tahun dari request
        $month = $request->input('month');
        $year = $request->input('year');

        // Konversi bulan ke nama bulan
        if ($month) {
            $monthName = Carbon::createFromFormat('m', $month)->format('F');
        } else {
            $monthName = 'Keseluruhan';
        }

        // Ambil semua data pengumpulan dengan relasi permintaan
        $pengumpulan = Pengumpulan::with('permintaan.pengguna')
            ->when($month, function ($query) use ($month) {
                $query->whereMonth('TGL_KUMPUL', $month);
            })
            ->when($year, function ($query) use ($year) {
                $query->whereYear('TGL_KUMPUL', $year);
            })
            ->get();

        // Array untuk menyimpan data yang akan dicetak di PDF
        $laporanPengumpulan = [];

        foreach ($pengumpulan as $item) {
            // Ambil insentif dari model Insentif berdasarkan ID_PERMINTAAN
            $insentif = Insentif::where('ID_PERMINTAAN', $item->ID_PERMINTAAN)->first();

            // Persiapkan data untuk laporan
            $laporanPengumpulan[] = [
                'ID_PERMINTAAN' => $item->ID_PERMINTAAN,
                'NAMA' => $item->permintaan->pengguna->NAMA,
                'NO_TELP' => $item->permintaan->pengguna->NO_TELP,
                'JUMLAH_KIRIM' => $item->JUMLAH_KIRIM,
                'ALAMAT_PERMINTAAN' => $item->permintaan->ALAMAT_PERMINTAAN,
                'TGL_KUMPUL' => $item->TGL_KUMPUL,
                'JUMLAH_INSENTIF' => $insentif ? $insentif->JUMLAH_INSENTIF : 0,
            ];
        }

        // Buat PDF menggunakan DomPDF dengan view LaporanPDF
        $pdf = PDF::loadView('LaporanPDF', compact('laporanPengumpulan', 'monthName', 'year'));

        // Mengirimkan file PDF untuk didownload
        $fileName = 'laporan-pengumpulan-' . $monthName . '-' . $year . '.pdf';
        return $pdf->download($fileName);
    }
}
