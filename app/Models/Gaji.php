<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $fillable = [
        "tunjangan_keluarga", 
        "tunjangan_struktural",
        "tunjangan_fungsional", 
        "tunjangan_transportasi", 
        "user_id"
    ];
}
