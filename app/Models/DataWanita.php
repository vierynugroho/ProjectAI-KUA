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
        'wanita__nama_lengkap',
        'wanita__kk',
        'wanita__ktp',
        'wanita__akta_ayah',
        'wanita__akta_ibu'
    ];
}
