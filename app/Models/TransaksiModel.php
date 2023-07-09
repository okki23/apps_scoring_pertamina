<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;
    protected $table = "trans_event";
    protected $fillable = ['id','nopek','tanggal','wilayah','jarak_tempuh','menit','menit_k50','pht','pkg','pko','minus_point'];
}