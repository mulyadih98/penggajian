<?php

namespace App\Http\Controllers;

use App\Services\JabatanServices;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JabatanServices $jabatanServices)
    {
        $jabatans = $jabatanServices->getAll();
        return view('admin.jabatans.index', compact('jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jabatans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, JabatanServices $jabatanServices)
    {
        $jabatanServices->add($request->all());
        return redirect()->route('jabatans.index')->with('scc', 'Jabatan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, JabatanServices $jabatanServices)
    {
        $jabatan = $jabatanServices->getById($id);
        return view('admin.jabatans.show',compact('jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, JabatanServices $jabatanServices)
    {
        $jabatan =  $jabatanServices->getById($id);
        return view('admin.jabatans.edit', compact('jabatan'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, JabatanServices $jabatanServices)
    {
        $jabatanServices->update($id,$request->all());
        return redirect()->route('jabatans.show',$id)->with('scc','Data Jabatan Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, JabatanServices $jabatanServices)
    {
        $jabatanServices->delete($id);

        return redirect()->route('jabatans.index')->with('scc', 'Jabatan Berhasil dihapus');
    }
}
