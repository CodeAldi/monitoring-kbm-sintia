<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Http\Request;

class UserGuruController extends Controller
{
    function index() {
        $guruMapel = User::where('role','like',UserRole::GuruMapel)->get();
        $guruPiket = User::where('role','like',UserRole::GuruMapel)->get();
        return view('userguru.index')->with('title','Data Master Akun Guru')->with('guruMapel',$guruMapel)->with('guruPiket',$guruPiket);
    }
    function store(Request $request) {
        $validatedData = $request->validate([
            'name'=>'required',
            'nomor_induk'=>'required|unique:users',
            'email'=> 'required|email:rfc,dns|unique:users',
            'password'=>'required|min:8',
        ]);
        $guru = new User();
        $guru->name = $request->name;
        $guru->nomor_induk = $request->nomor_induk;
        $guru->email = $request->email;
        $guru->password = bcrypt($request->password);
        $guru->role = UserRole::GuruMapel;
        $guru->save();
        return back();
    }
}
