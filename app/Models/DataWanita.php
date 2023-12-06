<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWanita extends Model
{
    use HasFactory;
    protected $table = 'data_wanita';
    protected $fillable = [
        'id',
        'nama_lengkap',
        'kk',
        'ktp',
        'akta_ayah',
        'akta_ibu'
    ];
}
