<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    function import() {
        
    }
    function index() {
        $mapel = Mapel::latest()->get();
        return view('mapel.index')->with('title','Data Master Mata Pelajaran')->with('mapel',$mapel);
    }
    function store(Request $request) {
        $validatedData = $request->validate([
            'nama_mapel' => 'required|unique:mapel|max:255',
            'kode_mapel' => 'required|unique:mapel|max:255',
        ]);
        $mapel = new Mapel();
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->kode_mapel = $request->kode_mapel;
        $mapel->save();
        return back();
    }
    function update(Mapel $mapel, Request $request) {
        $validatedData = $request->validate([
            'nama_mapel' => 'required|unique:mapel|max:255',
            'kode_mapel' => 'required|unique:mapel|max:255',
        ]);
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->kode_mapel = $request->kode_mapel;
        $mapel->save();
        return back();
    }
    function destroy(Mapel $mapel) {
        $mapel->delete();
        return back();
    }
}
