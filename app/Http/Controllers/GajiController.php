<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Services\GajiService;
use App\Services\UserServices;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GajiService $gajiService)
    {
        $users = $gajiService->getAll(now());

        return view('admin.gajis.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,GajiService $gajiService)
    {
        $gaji = $gajiService->addGaji($request->all());
        return response()->json([
            'gaji' => $gaji,
            'request' => $request->all()
        ],201);
    }

    public function bayar($userId, $periode,GajiService $gajiService){
        if($gajiService->getOne($userId,$periode)['gaji']){
            return redirect()->route('gajis.index');
        }
        $gaji = $gajiService->getOne($userId,$periode);
        $user =  $gaji['user'];
        return view('admin.gajis.bayar',compact('user','periode','gaji'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($gaji, GajiService $gajiService)
    {
        $user = $gajiService->getById($gaji);
        return view('admin.gajis.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, GajiService $gajiService)
    {
        $gajiService->delete($id);
        return redirect()->route('gajis.index');
    }

    public function getPerPeriode($periode, GajiService $gajiService){
        return response()->json($gajiService->getAll($periode));
    }

    public function getSlip($userid,$periode, GajiService $gajiService)
    {
        return $gajiService->getOne($userid,$periode);
    }

}
