<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PegawaiController extends Controller
{
    //
    public function index(){ 
        $jenis_pekerjaan = DB::table('jenis_pekerjaan')->get();  
        $fungsi_pekerjaan = DB::table('fungsi_pekerjaan')->get(); 
        $lokasi_pekerjaan = DB::table('lokasi_pekerjaan')->get();
        $kategori = DB::table('kategori')->get(); 
        return view('pegawai', ['jenis_pekerjaan' => $jenis_pekerjaan,'fungsi_pekerjaan' => $fungsi_pekerjaan,'lokasi_pekerjaan' => $lokasi_pekerjaan,'kategori' => $kategori]);

    }
    public function save(Request $request){
        dd($request->all());
    }
}
