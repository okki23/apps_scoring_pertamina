<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    use HasFactory;
    protected $table = "pegawai";
    protected $fillable = ['id','nopek','nama','id_jenis_pekerjaan','id_fungsi','id_lokasi_kerja','id_kategori','no_wa','tinggi_badan','berat_badan','size_baju'];
}
