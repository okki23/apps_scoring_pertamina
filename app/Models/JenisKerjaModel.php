<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKerjaModel extends Model
{ 
    use HasFactory;
    protected $table = "jenis_pekerjaan";
    protected $fillable = ['id','nama_jenis_pekerjaan'];
}
