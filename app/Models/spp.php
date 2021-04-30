<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spp extends Model
{
    protected $fillable = [
        'tahun',
        'nominal',
    ];
    protected $primaryKey = 'id_spp'; 
    use HasFactory;
}
