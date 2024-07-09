<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporProsesKbmController extends Controller
{
    function index() {
        return view('laporkbm.index')->with('title', 'Lapor Proses KBM');
    }
}
