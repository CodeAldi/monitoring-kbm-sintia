<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    function index() {
        return view('mapel.index')->with('title','Data Master Mata Pelajaran');
    }
    function store(Request $request) {
        
    }
}
