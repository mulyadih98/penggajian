<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class AuthController extends Controller
{
    public function login(Request $request, UserServices $userServices) {
        if(!$userServices->getByEmail($request->email)){
            return redirect()->back()->with('err', 'email tidak terdaftar');
        }

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->back()->with('err', 'Password Salah!!');
        }

        $user = Auth::user();
        if($user->jabatan->nama_jabatan == 'admin'){
            return redirect()->to('admin');
        }else if($user->jabatan->nama_jabatan == 'guru'){
            return redirect()->to('guru');
        }
    }
}
