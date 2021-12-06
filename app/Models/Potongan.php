<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    use HasFactory;

    protected $fillable = ["jenis_potongan", "jumlah", "gaji_id"];


    function gaji() {
        return $this->belongsTo(Gaji::class);
    }
}
