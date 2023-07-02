<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKerjaModel; 
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;

class JenisPekerjaanController extends Controller
{
     //
     public function index(){  
        return view('jeniskerja'); 
    }
    public function save(Request $request){

        $id = $request->id;

        if($id == NULL || $id == '' || empty($id)){
 
            $jeniskerja = new \App\Models\JenisKerjaModel;
            $jeniskerja->nama_jenis_pekerjaan  = $request->nama_jenis_pekerjaan; 
          
            $jeniskerja->save(); 
        }else{
            \DB::table('jenis_pekerjaan')->where('id',$request->id)->update([
                'nama_jenis_pekerjaan' => $request->nama_jenis_pekerjaan
            ]);
        }
       
    }

    public function jeniskerja_destroy(Request $request){ 
        $id  = $request->id;
        $jeniskerja = jeniskerjaModel::findOrFail($id);
 
        //delete post
        $jeniskerja->delete();

    }
    
    public function jeniskerja_put(Request $request){
        $id = $request->id;
        $data = jeniskerjaModel::findOrfail($id);
        return $data; 
    }

    public function jeniskerja_all_data(Request $request){

        if ($request->ajax()) {
            $data = jeniskerjaModel::all();
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
