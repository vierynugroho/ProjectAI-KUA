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


    public function DataPria()
    {
        return $this->hasOne(DataPria::class, 'id', 'id_pria');
    }

    public function DataWanita()
    {
        return $this->hasOne(DataWanita::class, 'id', 'id_wanita');
    }
}
