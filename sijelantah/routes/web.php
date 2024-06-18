<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PengumpulanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\InsentifController;
use App\Http\Controllers\RiwayatPenggunaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ForgotPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route Utama
Route::get('/Laravel', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('LandingPage');
});

// Route LOGIN
Route::get('/Masuk', [LoginController::class, 'masuk'])->name('masuk');
Route::post('/masuk_proses', [LoginController::class, 'masuk_proses'])->name('masuk_proses.submit');
Route::get('/logoutuser', [LoginController::class, 'logoutuser'])->name('logoutuser.submit');
// Pengumpul: Register
Route::get('/Gabung', [PenggunaController::class, 'showRegistrationForm'])->name('register');
Route::post('/Gabung', [PenggunaController::class, 'register'])->name('register.submit');

// routes/web.php

// Route untuk menampilkan form lupa password
Route::get('/lupa-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('LupaPasswordPengguna');
// Route untuk proses lupa password
Route::post('/lupa-password', [ForgotPasswordController::class, 'processForgotPassword'])->name('process-forgot-password');
// Route untuk menampilkan form set password baru
Route::get('/set-new-password/{pengguna}', [ForgotPasswordController::class, 'setNewPasswordForm'])->name('PasswordBaru');
// Route untuk update password baru
Route::post('/update-password/{pengguna}', [ForgotPasswordController::class, 'updatePassword'])->name('update-password');









Route::middleware(['checksession'])->group(function () {
    Route::get('/AdminPage', function () {
        return view('AdminPage');
    });
    Route::get('/PenggunaPage', function () {
        return view('PenggunaPage');
    });
    Route::get('/PengumpulPage', function () {
        return view('PengumpulPage');
    });
    Route::get('/KeluarPengumpul', function () {
        return view('LandingPage');
    });
    Route::get('/KeluarAdmin', function () {
        return view('LandingPage');
    });
    Route::get('/LaporanPage', function () {
        return view('LaporanPage');
    });

    Route::get('/ProfilPengguna', function () {
        return view('ProfilPenggunaPage');
    });



    //ROUTE ADMIN
    // Admin: Menampilkan data pengumpulan
    // Route::get('/AdminPage', [PengumpulanController::class, 'data_pengumpulan'])->name('data_pengumpulan');
    Route::post('/MemprosesPengumpulan/{id}/StatusPengumpulan', [PengumpulanController::class, 'StatusPengumpulan'])->name('StatusPengumpulan');
    Route::post('/kirim-ke-pengumpulan/{id}', [PermintaanController::class, 'kirimKePengumpulan'])->name('kirim_ke_pengumpulan');


    // Admin: Menampilkan Customer
    Route::get('/CustomerPage', [PenggunaController::class, 'dataCustomer'])->name('dataCustomer');

    // Admin: Menampilkan Insentif
    Route::get('/InsentifPage', [InsentifController::class, 'dataInsentif'])->name('dataInsentif');
    Route::post('/MemprosesIntensif/{id}/StatusIntensif', [InsentifController::class, 'StatusIntensif'])->name('StatusIntensif');

    // Admin: chart laporan
    // Route::get('/LaporanPage', [ChartController::class, 'laporan'])->name('laporan.page');
    Route::get('/LaporanPage', [ChartController::class, 'laporan'])->name('laporan.page');

    // Admin: Riwayat
    Route::get('/RiwayatAdmin', [PengumpulanController::class, 'riwayat_pengumpulan'])->name('riwayat_pengumpulan');

    // Admin: Dashboard
    Route::get('/AdminPage', [PengumpulanController::class, 'dashboar_admin'])->name('admin.dashboar_admin');

    //Admin: Generate PDF
    // Rute untuk mengunduh PDF
    Route::get('/export/pdf', [PdfController::class, 'generatePDFAll'])->name('export.pdf');
    Route::get('/pdf-generate', [PdfController::class, 'generatePDF'])->name('pdf.generate');
    Route::get('/export/excel', [ExcelController::class, 'generateEXCELall'])->name('export.excel');
    // Route untuk download Excel berdasarkan bulan dan tahun
    Route::get('/generate-excel', [ExcelController::class, 'generateEXCELByMonthYear']);




    // ROUTE PENGUMPUL
    // Pengumpul: Membuat Permintaan
    Route::post('/permintaan', [PermintaanController::class, 'buat_permintaan'])->name('permintaan.buat_permintaan');

    // Pengumpul: Edit profil
    Route::post('/editbaru', [PenggunaController::class, 'editbaru'])->name('editbaru');

    // Pengumpul: Riwayat
    Route::get('/RiwayatPengguna', [RiwayatPenggunaController::class, 'showRiwayat'])->name('showRiwayat');

    // Pengguna: Dashboard
    Route::get('/PenggunaPage', [PengumpulanController::class, 'dashboard'])->name('pengguna.dashboard');


    // ROUTE MASTER
    // Edit dan Delete Customer
    Route::get('/EditDataCustomer/{id}/edit_customer', [PenggunaController::class, 'edit_customer'])->name('edit_customer');
    Route::put('/customers/{id}', [PenggunaController::class, 'update_customer'])->name('customers.update');
    Route::delete('/customer/delete/{id}', [PenggunaController::class, 'hapus_pengguna'])->name('customer.hapus');
});
