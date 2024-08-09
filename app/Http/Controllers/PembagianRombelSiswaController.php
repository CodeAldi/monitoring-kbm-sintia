<?php

namespace App\Http\Controllers;

use App\Models\PembagianRombelSiswa;
use App\Models\Rombel;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PembagianRombelSiswaController extends Controller
{
    function index() {
        return view ('pembagianrombel.index')->with('title','pembagian kelas berdasarkan rombel');
    }
    function create($rombel){
        $rombel = Rombel::find($rombel);
        $datapembagian = PembagianRombelSiswa::where('rombongan_belajar_id',$rombel->id)->get();
        if (count($datapembagian)>0) {
            dd('lebih dari 0');
        }
        else{
            $datasiswa = Siswa::all();
        }
        return view('pembagianrombel.create')->with('title','penentuan rombel siswa')->with('rombel',$rombel)->with('datasiswa',$datasiswa);
    }
}
