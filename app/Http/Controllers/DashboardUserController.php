<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index(){
        return view('user.dashboard');
    }

    public function gaji() {
        $gaji = Gaji::with('user')->where('user_id',auth()->user()->id)->get();
        return view('user.gaji', compact('gaji'));
    }
    
}
