<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekJabatan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$jabatan)
    {
        $jabatanUser = auth()->user()->jabatan->nama_jabatan;
        if($jabatan != $jabatanUser){
            if($jabatanUser === 'admin'){
                return redirect()->to('admin');
            }

            if($jabatanUser === 'guru'){
                return redirect()->to('guru');
            }
        }else{

            return $next($request);
        }

    }
}