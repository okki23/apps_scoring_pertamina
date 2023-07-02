<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel; 
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;

class KategoriController extends Controller
{
     //
     public function index(){  
        return view('kategori'); 
    }
    public function save(Request $request){

        $id = $request->id;

        if($id == NULL || $id == '' || empty($id)){
 
            $kategori = new \App\Models\KategoriModel;
            $kategori->nama_kategori  = $request->nama_kategori; 
          
            $kategori->save(); 
        }else{
            \DB::table('kategori')->where('id',$request->id)->update([
                'nama_kategori' => $request->nama_kategori
            ]);
        }
       
    }

    public function kategori_destroy(Request $request){ 
        $id  = $request->id;
        $kategori = KategoriModel::findOrFail($id);
 
        //delete post
        $kategori->delete();

    }
    
    public function kategori_put(Request $request){
        $id = $request->id;
        $data = KategoriModel::findOrfail($id);
        return $data; 
    }

    public function kategori_all_data(Request $request){

        if ($request->ajax()) {
            $data = KategoriModel::all();
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
