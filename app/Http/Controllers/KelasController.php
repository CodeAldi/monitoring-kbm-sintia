<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    function index() {
        $kelas = Kelas::latest()->get();
        $jurusan = Jurusan::all();
        return view('kelas.index')->with('title', 'Data Master Kelas')->with('kelas',$kelas)->with('jurusan',$jurusan);
    }

    function store(Request $request) {
        $validatedData = $request->validate([
            'jurusan_id' => 'required',
            'tingkat_kelas' => 'required',
            'nama_kelas' => 'required|unique:kelas',
            'kode_kelas' => 'required|unique:kelas',
        ]);
        $kelas = new Kelas();
        $kelas->jurusan_id = $request->jurusan_id;
        $kelas->tingkat_kelas = $request->tingkat_kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kode_kelas = $request->kode_kelas;
        $kelas->save();
        return back();
    }

    function update(Kelas $kelas, Request $request) {
        $validatedData = $request->validate([
            'jurusan_id' => 'required',
            'tingkat_kelas' => 'required',
            'nama_kelas' => 'required',
            'kode_kelas' => 'required',
        ]);
        $kelas->jurusan_id = $request->jurusan_id;
        $kelas->tingkat_kelas = $request->tingkat_kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kode_kelas = $request->kode_kelas;
        $kelas->save();
        return back();
    }

    function destroy(Kelas $kelas) {
        $kelas->delete();
        return back();
    }
}
