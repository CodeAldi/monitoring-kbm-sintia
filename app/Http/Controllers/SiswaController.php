<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    function import(Request $request) {
        $validatedData = $request->validate([
            'siswaExcel'=> 'required|file|extensions:xls,xlsx,csv',
        ]);
        Excel::import(new SiswaImport,$request->file('siswaExcel'));
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambah/update melalui file excel');
        
    }
    function template() {
        return Excel::download(new SiswaExport,'Siswa.xlsx');
    }

    function index() {
        $siswa = Siswa::all();
        return view ('siswa.index')->with('title','Data Master Siswa')->with('siswa',$siswa);
    }
    function store(Request $request) {
        $validate = $request->validate([
            'nis'=> 'required',
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
