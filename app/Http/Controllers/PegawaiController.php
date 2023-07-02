<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;
 
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

        $id = $request->id;

        if($id == NULL || $id == '' || empty($id)){
 
            $pegawai = new \App\Models\PegawaiModel();
            $pegawai->nopek = $request->nopek;
            $pegawai->nama = $request->nama; 
            $pegawai->id_jenis_pekerjaan = $request->id_jenis_pekerjaan; 
            $pegawai->id_fungsi = $request->id_fungsi; 
            $pegawai->id_kategori = $request->id_kategori; 
            $pegawai->id_lokasi_kerja = $request->id_lokasi_kerja; 
            $pegawai->no_wa = $request->no_wa; 
            $pegawai->tinggi_badan = $request->tinggi_badan; 
            $pegawai->berat_badan = $request->berat_badan; 
            $pegawai->size_baju = $request->size_baju;  
          
            $pegawai->save(); 
        }else{
            \DB::table('pegawai')->where('id',$request->id)->update([
                'nopek' => $request->nopek,
                'nama' => $request->nama,
                'id_jenis_pekerjaan' => $request->id_jenis_pekerjaan,
                'id_fungsi' => $request->id_fungsi,
                'id_kategori' => $request->id_kategori,
                'id_lokasi_kerja' => $request->id_lokasi_kerja,
                'no_wa' => $request->no_wa,
                'tinggi_badan' => $request->tinggi_badan,
                'berat_badan' => $request->berat_badan,
                'size_baju' => $request->size_baju
            ]);
        }
       
    }

    public function pegawai_destroy(Request $request){ 
        $id  = $request->id;
        $pegawai = PegawaiModel::findOrFail($id);
 
        //delete post
        $pegawai->delete();

    }
    
    public function get_pegawai(Request $request){
        $id = $request->id;
        $data = PegawaiModel::findOrfail($id);
        return $data; 
    }

    public function get_all_data(Request $request){

        if ($request->ajax()) {
            $data = PegawaiModel::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" onclick="UbahData('.$row->id.');" class="btn btn-success btn-sm">Ubah</a> <a href="javascript:void(0)" onclick="DeleteData('.$row->id.');" class="btn btn-danger btn-sm">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        } 
    }
  
}
