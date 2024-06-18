<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumpulan;
use App\Models\Insentif;
use App\Models\Pengguna;
use App\Models\Permintaan;
use Illuminate\Support\Facades\DB;



class ChartController extends Controller
{

    public function laporan(Request $request)
    {
        // Mendapatkan tahun dari request atau menggunakan tahun saat ini untuk chart
        $yearForChart = $request->input('year', date('Y'));

        // Menghitung total minyak dikirim per bulan berdasarkan tahun yang dipilih untuk chart
        $totalminyak = Pengumpulan::selectRaw('MONTH(TGL_KUMPUL) as month, SUM(JUMLAH_KIRIM) as total_kirim')
            ->whereYear('TGL_KUMPUL', $yearForChart)
            ->groupBy('month')
            ->get();

        $labels = [];
        $data = [];

        foreach ($totalminyak as $item) {
            $labels[] = \DateTime::createFromFormat('!m', $item->month)->format('F');
            $data[] = $item->total_kirim;
        }

        // Menghitung frekuensi permintaan berdasarkan ID_PENGGUNA untuk chart
        $topUsers = Permintaan::select('ID_PENGGUNA', DB::raw('COUNT(ID_PENGGUNA) as frequency'))
            ->groupBy('ID_PENGGUNA')
            ->orderByDesc('frequency')
            ->limit(5) // Ambil lima pengguna dengan frekuensi tertinggi
            ->get();

        $userLabels = [];
        $userData = [];

        foreach ($topUsers as $user) {
            // Mengambil informasi pengguna
            $pengguna = Pengguna::find($user->ID_PENGGUNA);

            if ($pengguna) {
                $userLabels[] = $pengguna->USERNAME; // Sesuaikan dengan kolom yang sesuai
                $userData[] = intval($user->frequency); // Pastikan frekuensi dibulatkan
            }
        }

        // Ambil data pengumpulan untuk laporan tabel tanpa filter
        $laporanPengumpulan = Pengumpulan::with(['permintaan'])
            ->paginate(5);

        foreach ($laporanPengumpulan as $item) {
            // Ambil insentif dari model Insentif berdasarkan ID_PERMINTAAN
            $insentif = Insentif::where('ID_PERMINTAAN', $item->ID_PERMINTAAN)->first();

            // Tambahkan data tambahan ke item yang dipaginate
            $item->NAMA = $item->permintaan->pengguna->NAMA ?? 'N/A';
            $item->NO_TELP = $item->permintaan->pengguna->NO_TELP ?? 'N/A';
            $item->ALAMAT_PERMINTAAN = $item->permintaan->ALAMAT_PERMINTAAN ?? 'N/A';
            $item->JUMLAH_INSENTIF = $insentif ? $insentif->JUMLAH_INSENTIF : 0;
        }

        // Ambil daftar tahun yang tersedia dalam data pengumpulan untuk filter chart
        $availableYears = Pengumpulan::selectRaw('YEAR(TGL_KUMPUL) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Kembalikan view LaporanPage dengan data yang disiapkan
        return view('LaporanPage', compact('labels', 'data', 'userLabels', 'userData', 'laporanPengumpulan', 'availableYears', 'yearForChart'));
    }
}
