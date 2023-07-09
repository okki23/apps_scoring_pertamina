<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FungsiController;
use App\Http\Controllers\JenisOlahragaController;
use App\Http\Controllers\JenisPekerjaanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TransEventController;
use App\Http\Controllers\ReportIndividuController;
use App\Http\Controllers\ReportAllController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() { 

    // Route::get('/jenisor',[JenisOlahragaController::class,'index'])->name('jenisor');
    // Route::get('/jeniskerja',[JenisPekerjaanController::class,'index'])->name('jeniskerja');
    // Route::get('/kategori',[KategoriController::class,'index'])->name('kategori');
    // Route::get('/lokasi',[LokasiController::class,'index'])->name('lokasi');

    Route::get('/pegawai',[PegawaiController::class,'index'])->name('pegawai');
    Route::post('pegawai_save',[PegawaiController::class,'save'])->name('pegawai_save');
    Route::get('/pegawai_all',[PegawaiController::class,'get_all_data'])->name('pegawai_all');
    Route::post('/pegawai_destroy',[PegawaiController::class,'pegawai_destroy'])->name('pegawai_destroy');
    Route::post('/pegawai_put',[PegawaiController::class,'pegawai_put'])->name('pegawai_put');

    Route::get('/fungsi',[FungsiController::class,'index'])->name('fungsi');
    Route::post('fungsi_save',[FungsiController::class,'save'])->name('fungsi_save');
    Route::get('/fungsi_all',[FungsiController::class,'get_all_data'])->name('fungsi_all');
    Route::post('/fungsi_destroy',[FungsiController::class,'fungsi_destroy'])->name('fungsi_destroy');
    Route::post('/fungsi_put',[FungsiController::class,'fungsi_put'])->name('fungsi_put');

    Route::get('/jeniskerja',[JenisPekerjaanController::class,'index'])->name('jeniskerja');
    Route::post('jeniskerja_save',[JenisPekerjaanController::class,'save'])->name('jeniskerja_save');
    Route::get('/jeniskerja_all',[JenisPekerjaanController::class,'jeniskerja_all_data'])->name('jeniskerja_all_data');
    Route::post('/jeniskerja_destroy',[JenisPekerjaanController::class,'jeniskerja_destroy'])->name('jeniskerja_destroy');
    Route::post('/jeniskerja_put',[JenisPekerjaanController::class,'jeniskerja_put'])->name('jeniskerja_put');

    Route::get('/jenisor',[JenisOlahragaController::class,'index'])->name('jenisor');
    Route::post('jenisor_save',[JenisOlahragaController::class,'save'])->name('jenisor_save');
    Route::get('/jenisor_all',[JenisOlahragaController::class,'jenisor_all_data'])->name('jenisor_all_data');
    Route::post('/jenisor_destroy',[JenisOlahragaController::class,'jenisor_destroy'])->name('jenisor_destroy');
    Route::post('/jenisor_put',[JenisOlahragaController::class,'jenisor_put'])->name('jenisor_put');

    Route::get('/kategori',[KategoriController::class,'index'])->name('kategori');
    Route::post('kategori_save',[KategoriController::class,'save'])->name('kategori_save');
    Route::get('/kategori_all',[KategoriController::class,'kategori_all_data'])->name('kategori_all_data');
    Route::post('/kategori_destroy',[KategoriController::class,'kategori_destroy'])->name('kategori_destroy');
    Route::post('/kategori_put',[KategoriController::class,'kategori_put'])->name('kategori_put');

    Route::get('/lokasi',[LokasiController::class,'index'])->name('lokasi');
    Route::post('lokasi_save',[LokasiController::class,'save'])->name('lokasi_save');
    Route::get('/lokasi_all',[LokasiController::class,'lokasi_all_data'])->name('lokasi_all_data');
    Route::post('/lokasi_destroy',[LokasiController::class,'lokasi_destroy'])->name('lokasi_destroy');
    Route::post('/lokasi_put',[LokasiController::class,'lokasi_put'])->name('lokasi_put');

    Route::get('/trans_event',[TransEventController::class,'index'])->name('trans_event');
    Route::post('transaksi_save',[TransEventController::class,'save'])->name('transaksi_save');
    Route::get('/transaksi_all_data',[TransEventController::class,'transaksi_all_data'])->name('transaksi_all_data');
    Route::post('/transaksi_destroy',[TransEventController::class,'transaksi_destroy'])->name('transaksi_destroy');
    Route::post('/transaksi_put',[TransEventController::class,'transaksi_put'])->name('transaksi_put');


    Route::get('/report_individu',[ReportIndividuController::class,'index'])->name('report_individu');
    Route::get('/report_all',[ReportAllController::class,'index'])->name('report_all'); 

    Route::resource('roles', RoleController::class, [
        'as' => 'roles'
    ]);
    Route::resource('users', UserController::class, [
        'as' => 'users'
    ]);
    Route::resource('product', ProductController::class, [
        'as' => 'product'
    ]);
});