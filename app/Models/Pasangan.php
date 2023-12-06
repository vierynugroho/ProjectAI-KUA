<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasangan extends Model
{
    use HasFactory;
    protected $table = 'pasangan';
    protected $fillable = [
        'id_pria',
        'id_wanita',
    ];
}
