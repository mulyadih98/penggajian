<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUser;
use App\Services\JabatanServices;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserServices $userServices)
    {
        $users = $userServices->getAll();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(JabatanServices $jabatanServices)
    {
        $jabatan = $jabatanServices->getAll();
        return view('admin.users.create', compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostUser $request, UserServices $userServices)
    {
        $userServices->add($request->all());
        return redirect()->route('users.index')->with('scc', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, UserServices $userServices)
    {
        $user = $userServices->getById($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, UserServices $userServices,JabatanServices $jabatanServices)
    {
        $user = $userServices->getById($id);
        $jabatan = $jabatanServices->getAll();
        return view('admin.users.edit', ['user' => $user, 'jabatan' => $jabatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,UserServices $userServices)
    {
        $user = $userServices->update($id, $request->all());
        return redirect()->route('users.show',$user->id)->with('scc', 'data user berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, UserServices $userServices)
    {
        $userServices->delete($id);
        return redirect()->route('users.index')->with('scc', 'data user berhasil dihapus');
    }

    public function resetPassword($id, UserServices $userServices){
        $userServices->resetPassword($id);
        return redirect()->back()->with('scc','Password berhasil diperbarui');
    }
}
