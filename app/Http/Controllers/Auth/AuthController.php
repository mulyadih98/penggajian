<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(LoginRequest $request, UserServices $userServices) {
        if(!$userServices->getByEmail($request->email)){
            return redirect()->back()->with('err', 'email tidak terdaftar');
        }

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->back()->with('err', 'Password Salah!!');
        }

        $user = Auth::user();
        if($user->jabatan->nama_jabatan == 'admin'){
            echo 'admin';
            return redirect()->to('admin');
        }else if($user->jabatan->nama_jabatan == 'user'){
            echo 'user';
            return redirect()->to('user');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended('login');
    }
}
