<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    function index() {
        $rombel = Rombel::all();
        return view ('rombel.index')->with('title','Rombongan Belajar')->with('rombel',$rombel);
    }
    function store(Request $request) {
        $rombel = new Rombel();
        $rombel->nama_group_rombongan_belajar = $request->nama;
        $rombel->save();
        return back();
    }
}
