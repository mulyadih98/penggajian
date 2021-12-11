<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        return view('user.data-diri');
    }

    public function updateProfile(Request $request){
        $user = auth()->user()->id;
        $data = $request->validate([
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'agama' => 'required'
        ]);

        UserDetail::where('user_id', $user)->update($data);

        return redirect()->back()->with('scc', 'Data Diri Berhasil diperbarui');
    }

    public function account() {
        return view('Akun.index');
    }

    public function updatePassword(Request $request){
        $user = auth()->user()->id;
        $request->validate([
            'password' => 'required|confirmed'
        ]);
        $data = ['password' => bcrypt($request->password)];
        User::where('id', $user)->update($data);
        return redirect()->back()->with('scc', 'password berhasil diubah');
    }

    public function updateEmail(Request $request){
        $user = auth()->user()->id;
        $request->validate([
            'email' => 'required|email'
        ]);
        $data = ['email' => $request->email];
        User::where('id', $user)->update($data);
        return redirect()->back()->with('scc', 'Email berhasil diubah');
    }
}
