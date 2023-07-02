<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisOlahragaModel extends Model
{ 
    use HasFactory;
    protected $table = "jenis_olahraga";
    protected $fillable = ['id','nama_jenis_olahraga'];
}
