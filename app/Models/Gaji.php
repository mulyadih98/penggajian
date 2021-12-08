<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "gaji_pokok",
        "uang_transport",
        "uang_makan",
        "bonus",
        "lembur",
        "total_gaji",
        "diterima",
        "periode"
    ];

    function potongans(){
        return $this->hasMany(Potongan::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }
}
