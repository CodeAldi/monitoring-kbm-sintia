<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembagianRombelSiswaController extends Controller
{
    function index() {
        return view ('pembagianrombel.index')->with('title','pembagian kelas berdasarkan rombel');
    }
}
