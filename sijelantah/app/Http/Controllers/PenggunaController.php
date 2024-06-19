<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{

    public function dataCustomer()
    {
        // Retrieve all data from the pengguna table
        // but only for users with a status of "pengumpul"
        $pengguna = Pengguna::where('ROLE', 'pengumpul')->paginate(5);

        // Prepare the data to be sent to the view
        $data['dataCust'] = $pengguna;

        // Return the view with the data
        return view('CustomerPage', $data);
    }

    public function showRegistrationForm()
    {
        return view('GabungPenggunaPage');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'NAMA' => 'required|string|max:255',
            'USERNAME' => 'required|string',
            'EMAIL' => 'required|string|email|max:255|unique:tbl_pengguna',
            'NO_TELP' => 'required|max:20',
            'PASSWORD' => 'required|string|min:6',
        ]);

        $pengguna = Pengguna::create([
            'NAMA' => $validatedData['NAMA'],
            'USERNAME' => $validatedData['USERNAME'],
            'EMAIL' => $validatedData['EMAIL'],
            'NO_TELP' => $validatedData['NO_TELP'],
            'PASSWORD' => $validatedData['PASSWORD'],
            'ROLE' => 'pengumpul',
            'TGL_DAFTAR' => Carbon::now()
        ]);



        return redirect('/Masuk');
    }

    public function edit_customer($id)
    {
        $customer = Pengguna::findOrFail($id);
        return view('EditCustomerPage', compact('customer'));
    }

    public function update_customer(Request $request, $id)
    {
        // Mengambil data customer berdasarkan ID
        $customer = Pengguna::findOrFail($id);

        // Memperbarui data customer
        $customer->update([
            'NAMA' => $request->input('NAMA'),
            'EMAIL' => $request->input('EMAIL'),
            'NO_TELP' => $request->input('NO_TELP'),
            'ALAMAT' => $request->input('ALAMAT'),
        ]);

        // Mengambil semua data customer untuk ditampilkan di CustomerPage
        $customers = Pengguna::all();

        // Mengarahkan langsung ke view CustomerPage dengan data customers dan pesan sukses
        return view('CustomerPage', [
            'customers' => $customers,
            'success' => 'Customer updated successfully.'
        ]);
    }

    public function hapus_pengguna($id)
    {
        $pengguna = Pengguna::find($id);
        if ($pengguna) {
            $pengguna->delete();
            return redirect()->route('CustomerPage')->with('success', 'Data anggota berhasil dihapus.');
        } else {
            return redirect()->route('CustomerPage')->with('error', 'Data anggota tidak ditemukan.');
        }
    }

    // public function loginprosesuser(Request $request)
    // {
    //     // Mengambil pengguna berdasarkan username dari request
    //     $pengguna = Pengguna::where(['USERNAME' => $request->USERNAME])->first();
    //     if ($pengguna) {
    //         $request->session()->put('pengguna', $pengguna);
    //         echo $pengguna->ROLE;
    //         if ($pengguna->ROLE == "admin") {
    //             return redirect('/AdminPage');
    //         } elseif ($pengguna->ROLE == "pengumpul") {
    //             return redirect('/PenggunaPage');
    //         }
    //     } else {
    //         // Mengembalikan pesan jika username atau password tidak cocok
    //         return response()->json(['message' => 'username or password is not match']);
    //     }
    // }

    public function editbaru(Request $request)
    {
        $validatedData = $request->validate([
            'NAMA' => 'required|string|max:255',
            'EMAIL' => 'required|email|max:255',
            'ALAMAT' => 'required|string|max:255',
            'NO_TELP' => 'required|max:15',
        ]);

        // Ambil data pengguna dari sesi
        $IdPengguna = Session::get('pengguna')['ID_PENGGUNA'];
        //Log::info('ID Pengguna: ' . $IdPengguna);

        // Perbarui data pengguna
        $pengguna = Pengguna::find($IdPengguna);
        $pengguna->NAMA = $request->input('NAMA');
        $pengguna->EMAIL = $request->input('EMAIL');
        $pengguna->ALAMAT = $request->input('ALAMAT');
        $pengguna->NO_TELP = $request->input('NO_TELP');
        $pengguna->save();

        Session::put('pengguna', [
            'ID_PENGGUNA' => $pengguna->ID_PENGGUNA,
            'NAMA' => $pengguna->NAMA,
            'EMAIL' => $pengguna->EMAIL,
            'ALAMAT' => $pengguna->ALAMAT,
            'NO_TELP' => $pengguna->NO_TELP,
            'TGL_DAFTAR' => Session::get('pengguna')['TGL_DAFTAR'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }
}