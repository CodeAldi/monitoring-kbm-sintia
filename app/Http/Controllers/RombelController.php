<?php

namespace App\Http\Controllers;

use App\Models\PembagianRombelSiswa;
use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    function index() {
        $rombel = Rombel::all();
        foreach ($rombel as $key => $value) {
            $datasiswa[$value->id] = PembagianRombelSiswa::where('rombongan_belajar_id',$value->id)->count();
        }
        // dd($datasiswa);
        return view ('rombel.index')->with('title','Rombongan Belajar')->with('rombel',$rombel)->with('datasiswa',$datasiswa);
    }
    function store(Request $request) {
        $rombel = new Rombel();
        $rombel->nama_group_rombongan_belajar = $request->nama;
        $rombel->save();
        return back();
    }
}
