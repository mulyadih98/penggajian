<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $jabatan = Jabatan::withCount('users')->get();
        return view('admin.dashboard',compact('jabatan'));
    }
}
