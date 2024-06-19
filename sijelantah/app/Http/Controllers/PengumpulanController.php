<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Pengumpulan;
use App\Models\Insentif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengumpulanController extends Controller
{

    // public function data_pengumpulan()
    // {
    //     // Mengambil semua data dari tbl_kumpul beserta data permintaan terkait, pengguna, dan alamat
    //     // dengan status = "Menunggu"
    //     $pengumpulan = Pengumpulan::with(['permintaan'])->get();
    //     $data['dataPengumpulan'] = $pengumpulan;

    //     // Mengirim data ke view AdminPage
    //     return view('AdminPage', $data);
    // }

    public function dashboar_admin()
    {
        // Query untuk mengambil data pengumpulan
        $dataPengumpulan = Pengumpulan::with(['permintaan'])
            ->where('STATUS_PERMINTAAN', 'Menunggu')
            ->paginate(5);

        // Query untuk menghitung total Pengguna dengan status "Pengumpul"
        $total_pengguna = DB::table('tbl_pengguna')
            ->where('ROLE', 'Pengumpul')
            ->count();

        // Query untuk menghitung total minyak yang Disetujui dari semua pengguna
        $total_minyak = DB::table('tbl_pengumpulan')
            ->where('STATUS_PERMINTAAN', 'Disetujui')
            ->sum('JUMLAH_KIRIM');

        // Query untuk menghitung total insentif yang Terbayar dari semua pengguna
        $total_insentif = DB::table('tbl_insentif')
            ->where('STATUS', 'Terbayar')
            ->sum('JUMLAH_INSENTIF');

        // Kirim semua data ke view
        return view('AdminPage', compact('dataPengumpulan', 'total_pengguna', 'total_minyak', 'total_insentif'));
    }


    public function StatusPengumpulan(Request $request, $ID_KUMPUL)
    {
        // Temukan permintaan berdasarkan ID_KUMPUL
        $pengumpulan = Pengumpulan::find($ID_KUMPUL);

        // Jika permintaan tidak ditemukan, kembali dengan pesan error
        if (!$pengumpulan) {
            return redirect('/AdminPage')->with('error', 'Pengumpulan tidak ditemukan');
        }

        // Dapatkan status saat ini dari permintaan
        $status_sekarang = $request->status;

        // Tentukan status baru berdasarkan status saat ini
        if ($status_sekarang == "Menunggu") {
            $statusdata = [
                'STATUS_PERMINTAAN' => "Disetujui",
            ];
            $statusdataItensif = [
                'STATUS' => "Terbayar",
            ];
        } else if ($status_sekarang == "Ditolak") { // Added condition check for the 'else if'
            $statusdata = [
                'STATUS_PERMINTAAN' => "Ditolak",
            ];
            $statusdataItensif = [
                'STATUS' => "Belum Terbayar",
            ];
        } else if ($status_sekarang == "Disetujui") {
            $statusdata = [
                'STATUS_PERMINTAAN' => "Disetujui",
            ];
            $statusdataItensif = [
                'STATUS' => "Terbayar",
            ];
        }

        $id_insentif = $pengumpulan->ID_PERMINTAAN;
        $insentif = Insentif::where('ID_PERMINTAAN', $id_insentif)->first();



        // Update status permintaan
        $status = $pengumpulan->update($statusdata);
        $status1 = $insentif->update($statusdataItensif);

        // Cek apakah update berhasil dan kembalikan respon yang sesuai
        if ($status && $status1) {
            return response()->json(['success' => true, 'message' => 'Status berhasil diubah']);
        } else {
            return redirect('/AdminPage')->with('error', 'Gagal mengubah status');
        }
    }


    public function riwayat_pengumpulan(Request $request)
    {
        // Mengambil semua data dari tbl_kumpul beserta data permintaan terkait, pengguna, dan alamat
        $pengumpulan = Pengumpulan::with(['permintaan'])
            ->paginate($request->input('per_page', 10));

        // Mengirim data ke view AdminPage
        return view('RiwayatAdminPage', [
            'data' => $pengumpulan
        ]);
    }

    // public function dashboard()
    // {
    //     // Ambil id_pengguna dari session
    //     $id_pengguna = Session::get('pengguna')['ID_PENGGUNA'];

    //     // Query untuk menghitung total minyak yang Disetujui berdasarkan id_pengguna
    //     $total_minyak = DB::table('tbl_pengumpulan')
    //         ->join('tbl_permintaan', 'tbl_pengumpulan.ID_PERMINTAAN', '=', 'tbl_permintaan.ID_PERMINTAAN')
    //         ->where('tbl_permintaan.ID_PENGGUNA', $id_pengguna)
    //         ->where('tbl_pengumpulan.STATUS_PERMINTAAN', 'Disetujui')
    //         ->sum('tbl_pengumpulan.JUMLAH_KIRIM');

    //     // Query untuk menghitung total insentif yang Terbayar berdasarkan id_pengguna
    //     $total_uang = DB::table('tbl_insentif')
    //         ->where('ID_PENGGUNA', $id_pengguna)
    //         ->where('STATUS', 'Terbayar')
    //         ->sum('JUMLAH_INSENTIF');

    //     // Kirim data ke view
    //     return view('PenggunaPage', compact('total_minyak', 'total_uang'));
    // }

    public function dashboard()
    {
        // Ambil id_pengguna dari session
        $id_pengguna = Session::get('pengguna')['ID_PENGGUNA'];

        // Query untuk mengambil nama pengguna berdasarkan id_pengguna
        $pengguna = DB::table('tbl_pengguna')
            ->where('ID_PENGGUNA', $id_pengguna)
            ->first(); // Ambil satu baris hasil query

        // Pastikan pengguna ditemukan sebelum mengambil nama
        $nama = $pengguna ? $pengguna->NAMA : 'Pengguna tidak ditemukan';

        // Query untuk menghitung total minyak yang Disetujui berdasarkan id_pengguna
        $total_minyak = DB::table('tbl_pengumpulan')
            ->join('tbl_permintaan', 'tbl_pengumpulan.ID_PERMINTAAN', '=', 'tbl_permintaan.ID_PERMINTAAN')
            ->where('tbl_permintaan.ID_PENGGUNA', $id_pengguna)
            ->where('tbl_pengumpulan.STATUS_PERMINTAAN', 'Disetujui')
            ->sum('tbl_pengumpulan.JUMLAH_KIRIM');

        // Query untuk menghitung total insentif yang Terbayar berdasarkan id_pengguna
        $total_uang = DB::table('tbl_insentif')
            ->where('ID_PENGGUNA', $id_pengguna)
            ->where('STATUS', 'Terbayar')
            ->sum('JUMLAH_INSENTIF');

        // Kirim data ke view
        return view('PenggunaPage', compact('nama', 'total_minyak', 'total_uang'));
    }
}