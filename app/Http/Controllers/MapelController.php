<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Exports\MapelExport;
use App\Imports\MapelImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MapelController extends Controller
{
    function import(Request $request)
    {
        $validatedData = $request->validate([
            'siswaExcel' => 'required|file|extensions:xls,xlsx,csv',
        ]);
        Excel::import(new MapelImport, $request->file('siswaExcel'));
        return redirect()->route('mapel.index')->with('success', 'Data mapel berhasil ditambah/update melalui file excel');
    }
    function template() {
        return Excel::download(new MapelExport, 'Mapel.xlsx');
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
