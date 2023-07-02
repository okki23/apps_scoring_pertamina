<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FungsiModel; 
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;

class FungsiController extends Controller
{
     //
     public function index(){  
        return view('fungsi'); 
    }
    public function save(Request $request){

        $id = $request->id;

        if($id == NULL || $id == '' || empty($id)){
 
            $fungsi = new \App\Models\FungsiModel;
            $fungsi->nama_fungsi_pekerjaan  = $request->nama_fungsi_pekerjaan; 
          
            $fungsi->save(); 
        }else{
            \DB::table('fungsi')->where('id',$request->id)->update([
                'nama_fungsi_pekerjaan' => $request->nama_fungsi_pekerjaan
            ]);
        }
       
    }

    public function fungsi_destroy(Request $request){ 
        $id  = $request->id;
        $fungsi = FungsiModel::findOrFail($id);
 
        //delete post
        $fungsi->delete();

    }
    
    public function fungsi_put(Request $request){
        $id = $request->id;
        $data = FungsiModel::findOrfail($id);
        return $data; 
    }

    public function fungsi_all_data(Request $request){

        if ($request->ajax()) {
            $data = FungsiModel::all();
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
