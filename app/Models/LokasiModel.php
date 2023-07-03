<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiModel extends Model
{ 
    use HasFactory;
    protected $table = "lokasi_pekerjaan";
    protected $fillable = ['id','nama_lokasi_pekerjaan'];
}
