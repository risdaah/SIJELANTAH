<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatPenggunaController extends Controller
{

    public function showRiwayat(Request $request)
    {
        // Ambil ID_PENGGUNA dari session
        $idPengguna = Session::get('pengguna')['ID_PENGGUNA'];

        // Query untuk mengambil nama pengguna berdasarkan id_pengguna
        $pengguna = DB::table('tbl_pengguna')
            ->where('ID_PENGGUNA', $idPengguna)
            ->first(); // Ambil satu baris hasil query

        // Pastikan pengguna ditemukan sebelum mengambil nama
        $nama = $pengguna ? $pengguna->NAMA : 'Pengguna tidak ditemukan';

        // Ambil data permintaan dan lakukan join dengan pengumpulan dan insentif untuk mendapatkan status dan jumlah insentif
        $permintaan = Permintaan::leftJoin('tbl_pengumpulan', 'tbl_permintaan.ID_PERMINTAAN', '=', 'tbl_pengumpulan.ID_PERMINTAAN')
            ->leftJoin('tbl_insentif', 'tbl_permintaan.ID_PERMINTAAN', '=', 'tbl_insentif.ID_PERMINTAAN')
            ->where('tbl_permintaan.ID_PENGGUNA', $idPengguna)
            ->select('tbl_permintaan.*', 'tbl_pengumpulan.STATUS_PERMINTAAN', 'tbl_insentif.JUMLAH_INSENTIF')
            ->paginate(5); // Set the number of items per page (10 in this example)

        // Mengirim data ke view RiwayatPenggunaPage
        return view('RiwayatPenggunaPage', compact('nama', 'permintaan'));
    }
}