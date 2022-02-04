<?php

namespace App\Http\Controllers;

use App\Services\GajiService;
use Illuminate\Http\Request;
use PDF;
class CetakLaporan extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $periode, GajiService $gajiService)
    {
        $data = [
            'gaji' => $gajiService->getAll($periode),
            'bulan' => explode('-',$periode)[1],
            'tahun' => explode('-',$periode)[0]
        ];
        $pdf = PDF::loadView('laporan.gaji-perbulan', $data);
        return $pdf->stream('slip_gaji.pdf');
    }
}
