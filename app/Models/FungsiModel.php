<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FungsiModel extends Model
{ 
    use HasFactory;
    protected $table = "fungsi_pekerjaan";
    protected $fillable = ['id','nama_fungsi_pekerjaan'];
}
