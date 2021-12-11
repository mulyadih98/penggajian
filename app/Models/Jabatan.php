<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = ["nama_jabatan", "gaji_pokok", "uang_makan","uang_transport"];

    public function users() {
        return $this->hasMany(User::class);
    }
}
