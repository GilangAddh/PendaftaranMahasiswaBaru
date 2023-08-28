<?php

use App\Http\Controllers\CetakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPendaftarController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('landing');
})->middleware('guest');

Route::get('/login', [LoginController::class, 'main'])->name('register.login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'main'])->name('register.index')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register')->middleware('guest');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/get-kota/{provinsiId}', [FormController::class, 'getKota']);
    Route::get('/cetak', [CetakController::class, 'main'])->name('cetak.index');
    Route::get('/cetakpdf', [CetakController::class, 'cetak'])->name('cetak.pdf');
});

Route::middleware(['user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'main'])->name('dashboard.user');

    Route::get('/form', [FormController::class, 'main'])->name('form.index');
    Route::post('/form', [FormController::class, 'pendaftaran'])->name('pendaftaran');
});

Route::middleware(['admin'])->group(function () {

    Route::get('/dashboardAdmin', [DashboardController::class, 'mainAdmin'])->name('dashboard.admin');

    Route::get('/dataUser', [DataUserController::class, 'main'])->name('dataUser.index');
    Route::get('/dataUser/proses-delete', [DataUserController::class, 'ProsesDelete'])->name('dataUser.delete');
    Route::get('/dataUser/tambah', [DataUserController::class, 'tambah'])->name('dataUser.tambah');
    Route::post('/dataUser/tambah', [DataUserController::class, 'store'])->name('dataUser.tambahProses');
    Route::get('/dataUser/edit', [DataUserController::class, 'edit'])->name('dataUser.edit');
    Route::post('/dataUser/edit', [DataUserController::class, 'editStore'])->name('dataUser.editProses');

    Route::get('/dataPendaftar', [DataPendaftarController::class, 'main'])->name('dataPendaftar.index');
    Route::get('/dataPendaftar/proses-delete', [DataPendaftarController::class, 'ProsesDelete'])->name('dataPendaftar.delete');
    Route::get('/dataPendaftar/tambah', [DataPendaftarController::class, 'tambah'])->name('dataPendaftar.tambah');
    Route::post('/dataPendaftar/tambah', [DataPendaftarController::class, 'store'])->name('dataPendaftar.tambahProses');
    Route::get('/dataPendaftar/edit', [DataPendaftarController::class, 'edit'])->name('dataPendaftar.edit');
    Route::post('/dataPendaftar/edit', [DataPendaftarController::class, 'editStore'])->name('dataPendaftar.editProses');
});
