<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PegawaiController extends Controller
{
    //
    public function index(){ 
        $datalist['jenis_pekerjaan'] = DB::table('jenis_pekerjaan')->get();
        $datalist['fungsi_pekerjaan'] = DB::table('fungsi_pekerjaan')->get();
        $datalist['lokasi_pekerjaan'] = DB::table('lokasi_pekerjaan')->get();
        $datalist['kategori'] = DB::table('kategori')->get(); 
        return view('pegawai',compact('datalist'));
    }
}
