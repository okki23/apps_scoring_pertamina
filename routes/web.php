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
 
    Route::get('/fungsi',[FungsiController::class,'index'])->name('fungsi');
    Route::get('/jenisor',[JenisOlahragaController::class,'index'])->name('jenisor');
    Route::get('/jeniskerja',[JenisPekerjaanController::class,'index'])->name('jeniskerja');
    Route::get('/kategori',[KategoriController::class,'index'])->name('kategori');
    Route::get('/lokasi',[LokasiController::class,'index'])->name('lokasi');

    Route::get('/pegawai',[PegawaiController::class,'index'])->name('pegawai');
    Route::post('pegawai_save',[PegawaiController::class,'save'])->name('pegawai_save');

    Route::get('/trans_event',[TransEventController::class,'index'])->name('trans_event');
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