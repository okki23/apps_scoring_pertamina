<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisOlahragaModel; 
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;

class JenisOlahragaController extends Controller
{
     //
     public function index(){  
        return view('jenis_olahraga'); 
    }
    public function save(Request $request){

        $id = $request->id;

        if($id == NULL || $id == '' || empty($id)){
 
            $jenisor = new \App\Models\JenisOlahragaModel;
            $jenisor->nama_jenis_olahraga  = $request->nama_jenis_olahraga; 
          
            $jenisor->save(); 
        }else{
            \DB::table('jenis_olahraga')->where('id',$request->id)->update([
                'nama_jenis_olahraga' => $request->nama_jenis_olahraga
            ]);
        }
       
    }

    public function jenisor_destroy(Request $request){ 
        $id  = $request->id;
        $jenisor = JenisOlahragaModel::findOrFail($id);
 
        //delete post
        $jenisor->delete();

    }
    
    public function jenisor_put(Request $request){
        $id = $request->id;
        $data = JenisOlahragaModel::findOrfail($id);
        return $data; 
    }

    public function jenisor_all_data(Request $request){

        if ($request->ajax()) {
            $data = JenisOlahragaModel::all();
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
