<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    function index() {
        $jurusan = Jurusan::latest()->get();
        return view('jurusan.index')->with('title','Data Master Jurusan')->with('jurusan',$jurusan);
    }
    function store(Request $request) {
        $validatedData = $request->validate([
            'nama_jurusan'=> 'required|unique:jurusan',
            'kode_jurusan' => 'required|unique:jurusan',
        ]);
        $jurusan = new Jurusan();
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->kode_jurusan = $request->kode_jurusan;
        $jurusan->save();
        return back();
    }
    function update(Jurusan $jurusan,Request $request) {
        $validatedData = $request->validate([
            'nama_jurusan' => 'required',
            'kode_jurusan' => 'required',
        ]);
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->kode_jurusan = $request->kode_jurusan;
        $jurusan->save();
        return back();
    }
    function destroy(Jurusan $jurusan) {
        $jurusan->delete();
        return back();
    }
}
