<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Http\Request;

class UserGuruController extends Controller
{
    function index() {
        $guruMapel = User::where('role','!=',UserRole::Admin)->get();
        // $guruPiket = User::where('role','like',UserRole::GuruPiket)->get();
        // $guru = [$guruMapel,$guruPiket];
        $role = UserRole::cases();
        // dd($role);
        return view('userguru.index')->with('title','Data Master Akun Guru')
        ->with('guruMapel',$guruMapel)->with('role',$role)
        // ->with('guruPiket',$guruPiket)
        ;
    }
    function store(Request $request) {
        $validatedData = $request->validate([
            'name'=>'required',
            'nomor_induk'=>'required|unique:users|numeric',
            'email'=> 'required|email|unique:users',
            'password'=>'required|min:8',
            'role' => 'required'
        ]);
        $guru = new User();
        $guru->name = $request->name;
        $guru->nomor_induk = $request->nomor_induk;
        $guru->email = $request->email;
        $guru->password = bcrypt($request->password);
        $guru->role = $request->role;
        $guru->save();
        return back();
    }
    function update(Request $request, User $guru) {
        $validatedData = $request->validate([
            'name' => 'required',
            'nomor_induk' => 'required',
        ]);
        $guru->name = $request->name;
        $guru->nomor_induk = $request->nomor_induk;
        $guru->save();
        return back();
    }
    function destroy(User $guru) {
        $guru->delete();
        return back();
    }
}
