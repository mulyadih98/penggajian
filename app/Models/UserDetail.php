<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "nama_lengkap",
        "tanggal_lahir",
        "tempat_lahir",
        "alamat",
        "no_telepon",
        "agama",
    ];


    function user() {
        return $this->belongsTo(User::class);
    }
}
