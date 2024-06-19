<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Permintaan;
use App\Models\Pengumpulan;
use App\Models\Insentif;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    public function kirimKePengumpulan(Request $request, $ID_PERMINTAAN)
    {
        // Ambil data permintaan berdasarkan ID
        $permintaan = Permintaan::with(['pengguna'])->find($ID_PERMINTAAN);

        if (!$permintaan) {
            return redirect()->back()->with('error', 'Permintaan tidak ditemukan.');
        }

        // Persiapkan data untuk dimasukkan ke tabel pengumpulan
        $dataPengumpulan = [
            'ID_PERMINTAAN' => $permintaan->ID_PERMINTAAN,
            'NAMA' => $permintaan->pengguna->NAMA,
            'NO_TELP' => $permintaan->pengguna->NO_TELP,
        ];

        // Simpan data ke tabel pengumpulan
        Pengumpulan::create($dataPengumpulan);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('sukses', 'Data berhasil dikirim ke pengumpulan.');
    }

    public function buat_permintaan(Request $request)
    {
        $idPengguna = Session::get('pengguna')['ID_PENGGUNA'];
        $permintaan = Permintaan::create([
            'ID_PENGGUNA' => $idPengguna,
            'TGL_MINTA' => Carbon::now(),
            'TGL_KUMPUL' => Carbon::now(),
            'ALAMAT_PERMINTAAN' => $request->ALAMAT_PERMINTAAN,
            'KATEGORI' => $request->KATEGORI,
            'JUMLAH_KIRIM' => $request->JUMLAH_KIRIM,
        ]);

        return redirect('/RiwayatPengguna');
    }

    public function hapus_permintaan($id)
    {
        try {
            // Mulai transaksi
            DB::beginTransaction();

            // Temukan permintaan berdasarkan ID
            $permintaan = Permintaan::findOrFail($id);

            // Hapus data yang terkait dari tabel lain berdasarkan permintaan ID
            // Sesuaikan nama model dan kolom ID sesuai dengan skema database Anda
            Permintaan::where('ID_PERMINTAAN', $permintaan->ID_PERMINTAAN)->delete();
            Pengumpulan::where('ID_PERMINTAAN', $permintaan->ID_PERMINTAAN)->delete();
            Insentif::where('ID_PERMINTAAN', $permintaan->ID_PERMINTAAN)->delete();

            // Hapus data permintaan
            $permintaan->delete();

            // Commit transaksi
            DB::commit();

            // Redirect ke halaman riwayat pengguna dengan pesan sukses
            return redirect('/RiwayatPengguna')->with('success', 'Permintaan berhasil dihapus');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            // Redirect ke halaman riwayat pengguna dengan pesan error
            return redirect('/RiwayatPengguna')->with('error', 'Gagal menghapus permintaan: ' . $e->getMessage());
        }
    }
}