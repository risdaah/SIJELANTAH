<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;

class LoginController extends Controller
{
    //

    public function masuk()
    {
        return view('MasukPage');
    }

    public function masuk_proses(Request $request)
    {
        // Validasi input
        $request->validate([
            'USERNAME' => 'required',
            'PASSWORD' => 'required',
        ]);

        // Mengambil pengguna berdasarkan username dari request
        $pengguna = Pengguna::where('USERNAME', $request->USERNAME)->first();

        if ($pengguna) {
            // Memeriksa apakah password yang dimasukkan sesuai
            if ($request->PASSWORD == $pengguna->PASSWORD) { // Membandingkan password tanpa hashing (harap di-hash dengan baik untuk produksi)
                // Jika password cocok, simpan pengguna ke dalam session
                $request->session()->put('pengguna', $pengguna);

                // Redirect berdasarkan ROLE dari pengguna
                if ($pengguna->ROLE == "admin") {
                    return redirect('/AdminPage');
                } elseif ($pengguna->ROLE == "pengumpul") {
                    return redirect('/PenggunaPage');
                }
            }
        }

        // Jika autentikasi gagal atau data tidak sesuai
        $error_message = 'Username atau password salah.';
        return redirect()->route('masuk')->with('error_message', $error_message);
    }



    public function logoutuser(Request $request)
    {
        $request->session()->forget('pengguna');
        return redirect('/');
    }
}