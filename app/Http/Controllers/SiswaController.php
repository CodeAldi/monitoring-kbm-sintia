<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    function import() {
        Excel::import(new SiswaImport,'siswa.xlsx');
        
    }

    function index() {
        $siswa = Siswa::all();
        return view ('siswa.index')->with('title','Data Master Siswa')->with('siswa',$siswa);
    }
    function store(Request $request) {
        $validate = $request->validate([
            'nis'=> 'required|unique:siswa',
            'nama'=> 'required',
            'jenis_kelamin'=>'required|doesnt_start_with:0',
        ]);
        $siswa = new Siswa();
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->save();
        return back()->with('success','Data siswa berhasil ditambah');
    }
}
