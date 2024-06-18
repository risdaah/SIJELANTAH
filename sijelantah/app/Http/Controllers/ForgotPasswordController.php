<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('LupaPasswordPengguna');
    }

    public function processForgotPassword(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'USERNAME' => 'required',
        ]);

        $pengguna = Pengguna::where('USERNAME', $request->USERNAME)
            ->first();

        if ($pengguna) {
            return redirect()->route('PasswordBaru', ['pengguna' => $pengguna->ID_PENGGUNA]);
        } else {
            return back()->with('error', 'Username tidak ditemukan.');
        }
    }

    public function setNewPasswordForm($pengguna)
    {
        $pengguna = Pengguna::findOrFail($pengguna); // Ambil pengguna berdasarkan ID_PENGGUNA
        return view('PasswordBaru', compact('pengguna'));
    }

    public function updatePassword(Request $request, $pengguna)
    {
        $request->validate([
            'new_password' => 'required|min:6', // Validasi password baru
        ]);

        // Simpan password baru tanpa enkripsi ke dalam model Pengguna
        $pengguna = Pengguna::findOrFail($pengguna); // Ambil pengguna berdasarkan ID_PENGGUNA
        $pengguna->update([
            'PASSWORD' => $request->new_password,
        ]);

        // Redirect ke halaman atau tindakan selanjutnya setelah berhasil
        return redirect('/Masuk')->with('success', 'Password berhasil diubah. Silakan masuk dengan password baru Anda.');
    }
}
