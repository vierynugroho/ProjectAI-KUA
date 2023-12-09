<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPria extends Model
{
    use HasFactory;
    protected $table = 'data_pria';

    protected $fillable = [
        'id',
        'pria__nama_lengkap',
        'pria__kk',
        'pria__ktp',
        'pria__akta_ayah',
        'pria__akta_ibu'
    ];
}
