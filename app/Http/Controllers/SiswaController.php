<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function index() {
        $siswa = Siswa::all();
        return view ('siswa.index')->with('title','Data Master Siswa')->with('siswa',$siswa);
    }
    function store(Request $request) {
        $siswa = new Siswa();
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->save();
        return back();
    }
}
