<?php

namespace App\Http\Controllers;

use App\Services\GajiService;
use Illuminate\Http\Request;
use PDF;
class SlipGajiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($gaji_id, GajiService $gajiService)
    {
        $data = $gajiService->getById($gaji_id);
        $pdf = PDF::loadView('slip.index', compact('data'));
        return $pdf->stream('slip_gaji.pdf');
    }
}
