<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LokasiModel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;

class LokasiController extends Controller
{
     //
     public function index(){  
        return view('lokasi'); 
    }
    public function save(Request $request){

        $id = $request->id;

        if($id == NULL || $id == '' || empty($id)){
 
            $lokasi = new \App\Models\LokasiModel;
            $lokasi->nama_lokasi_pekerjaan  = $request->nama_lokasi_pekerjaan; 
          
            $lokasi->save(); 
        }else{
            \DB::table('lokasi_pekerjaan')->where('id',$request->id)->update([
                'nama_lokasi_pekerjaan' => $request->nama_lokasi_pekerjaan
            ]);
        }
       
    }

    public function lokasi_destroy(Request $request){ 
        $id  = $request->id;
        $lokasi = LokasiModel::findOrFail($id);
 
        //delete post
        $lokasi->delete();

    }
    
    public function lokasi_put(Request $request){
        $id = $request->id;
        $data = LokasiModel::findOrfail($id);
        return $data; 
    }

    public function lokasi_all_data(Request $request){

        if ($request->ajax()) {
            $data = LokasiModel::all();
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
