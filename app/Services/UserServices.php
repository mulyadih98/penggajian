<?php
namespace App\Services;

use App\Models\User;

class UserServices {
    public function getByEmail($email){
        return User::where('email',$email)->first();
    }
}