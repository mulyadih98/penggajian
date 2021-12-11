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
        $jabatanUser = auth()->user()->role;
        if($jabatan != $jabatanUser){
            if($jabatanUser === 'admin'){
                return redirect()->to('admin');
            }

            if($jabatanUser === 'user'){
                return redirect()->to('user');
            }
        }else{

            return $next($request);
        }

    }
}