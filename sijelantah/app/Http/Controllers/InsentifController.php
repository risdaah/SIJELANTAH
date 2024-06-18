<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Insentif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Pengumpulan;
use App\Models\Permintaan;
use Illuminate\Support\Facades\Session;

class InsentifController extends Controller
{
    public function dataInsentif()
    {
        // Ambil data Insentif dengan relasi ke tbl_permintaan dan pengguna
        $bayar = Insentif::with(['permintaan' => function ($query) {
            // Menambahkan kondisi where untuk membatasi berdasarkan ID_PERMINTAAN
            $query->select('ID_PERMINTAAN', 'TGL_KUMPUL');
        }, 'pengguna' => function ($query) {
            // Menambahkan kondisi where untuk membatasi berdasarkan ID_PENGGUNA
            $query->select('ID_PENGGUNA', 'NAMA');
        }])->get();

        // Mengirimkan data ke view
        $data['listInsentif'] = $bayar;
        return view('InsentifPage', $data);
    }

    public function StatusInsentif(Request $request, $ID_Insentif)
    {
        $pembayaran = Insentif::find($ID_Insentif);

        // Jika permintaan tidak ditemukan, kembali dengan pesan error
        if (!$pembayaran) {
            Log::error('Data Insentif tidak ditemukan untuk ID: ' . $ID_Insentif);
            return redirect('/InsentifPage')->with('error', 'Data Insentif tidak ditemukan');
        }

        // Dapatkan status saat ini dari permintaan
        $status_sekarang = $pembayaran->STATUS;

        // Tentukan status baru berdasarkan status saat ini
        if ($status_sekarang == "belum terbayar") {
            $statusdata = [
                'STATUS' => "terbayar",
            ];
        } else {
            // Jika status tidak berubah, kita tidak melakukan apa-apa.
            Log::info('Status sudah "terbayar" untuk ID: ' . $ID_Insentif);
            return redirect('/InsentifPage')->with('info', 'Status sudah "terbayar"');
        }

        // Update status permintaan
        $status = $pembayaran->update($statusdata);

        // Cek apakah update berhasil dan kembalikan respon yang sesuai
        if ($status) {
            Log::info('Status berhasil diubah untuk ID: ' . $ID_Insentif);
            return redirect('/InsentifPage')->with('sukses', 'Status berhasil diubah');
        } else {
            Log::error('Gagal mengubah status untuk ID: ' . $ID_Insentif);
            return redirect('/InsentifPage')->with('error', 'Gagal mengubah status');
        }
    }

    public function kirimKeRiwayatAdmin(Request $request, $ID_INSENTIF)
    {
        // Ambil data insentif berdasarkan ID
        $insen = Insentif::with(['permintaan'])->find($ID_INSENTIF);

        if (!$insen) {
            return redirect()->back()->with('error', 'Insentif tidak ditemukan.');
        }

        // Ambil ID_PERMINTAAN dari objek Insentif
        $ID_PERMINTAAN = $insen->permintaan->ID_PERMINTAAN;

        // Persiapkan data untuk dimasukkan ke tabel pengumpulan
        $data = [
            'ID_PERMINTAAN' => $ID_PERMINTAAN,
            'JUMLAH_INSENTIF' => $insen->permintaan->JUMLAH_INSENTIF,
        ];

        // Simpan data ke tabel pengumpulan
        Pengumpulan::create($data); // Ganti Pengumpulan dengan nama model yang sesuai

        // Redirect dengan pesan sukses
        return redirect()->back()->with('sukses', 'Data berhasil dikirim ke pengumpulan.');
    }

    // public function totalInsentifPengguna()
    // {
    //     // Retrieve id_pengguna from session
    //     $id_pengguna = Session::get('pengguna')['ID_PENGGUNA'];

    //     // Check if id_pengguna is retrieved correctly
    //     if (!$id_pengguna) {
    //         return response()->json(['error' => 'ID_PENGGUNA not found in session'], 400);
    //     }

    //     // Perform the query to calculate total insentif
    //     $total_uang = Insentif::where('ID_PENGGUNA', $id_pengguna)
    //         ->where('STATUS', 'Terbayar')
    //         ->sum('JUMLAH_INSENTIF');

    //     // Debug the total amount
    //     // dd($total_uang);

    //     // Send data to the view
    //     return view('PenggunaPage', compact('total_uang'));
    // }

    // public function totalInsentifPengguna()
    // {
    //     $total_uang = 30000;

    //     // Send data to the view
    //     return view('PenggunaPage', compact('total_uang'));
    // }
}
