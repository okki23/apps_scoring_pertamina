<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;

class TransEventController extends Controller
{
    public function index(){  
        
        $pegawai = DB::table('pegawai')->get();  
        return view('transaksi',['pegawai'=>$pegawai]); 
    }
    public function save(Request $request){

        $id = $request->id;

        if($id == NULL || $id == '' || empty($id)){
 
            $transaksi = new \App\Models\TransaksiModel;
            $transaksi->nopek  = $request->nopek; 
            $transaksi->tanggal  = $request->tanggal; 
            $transaksi->wilayah  = $request->wilayah; 
            $transaksi->jarak_tempuh  = $request->jarak_tempuh; 
            $transaksi->menit  = $request->menit; 
            $transaksi->menit_k50  = $request->menit_k50; 
            $transaksi->pht  = $request->pht; 
            $transaksi->pkg  = $request->pkg; 
            $transaksi->pko  = $request->pko; 
            $transaksi->minus_point  = $request->minus_point; 
            
            $transaksi->save(); 
        }else{
            \DB::table('trans_event')->where('id',$request->id)->update([
                'nopek' => $request->nopek,
                'tanggal' => $request->tanggal,
                'wilayah' => $request->wilayah,
                'jarak_tempuh' => $request->jarak_tempuh,
                'menit' => $request->menit,
                'menit_k50' => $request->menit_k50,
                'pht' => $request->pht,
                'pkg' => $request->pkg,
                'pko' => $request->pko,
                'minus_point' => $request->minus_point 
            ]);
        }
       
    }

    public function transaksi_destroy(Request $request){ 
        $id  = $request->id;
        $transaksi = TransaksiModel::findOrFail($id);
 
        //delete post
        $transaksi->delete();

    }
    
    public function transaksi_put(Request $request){
        $id = $request->id;
        $data = TransaksiModel::findOrfail($id);
        return $data; 
    }

    public function transaksi_all_data(Request $request){

        if ($request->ajax()) {

            $data = DB::table('trans_event')
            ->join('pegawai', 'trans_event.nopek', '=', 'pegawai.nopek') 
            ->select('trans_event.*', 'pegawai.nama as nama_pegawai')
            ->get();

            // $data = TransaksiModel::all();
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
