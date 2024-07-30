<?php

namespace App\Http\Controllers;

use App\Models\GuruMapel;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\JadwalMengajar;
use App\Models\lapor_proses_kbm;

class LaporanKbmController extends Controller
{
    function pilihkelas() {
        $listKelas = Kelas::all();
        
        return view ('laporankbm.pilihkelas')->with('title','pilih kelas')->with('listkelas',$listKelas);
    }
    function pilihmapel(Request $request) {
        $mapelkelas = GuruMapel::where('kelas_id',$request->kelas)->get();
        return view ('laporankbm.pilihmapel')->with('title','pilih mapel')->with('mapel',$mapelkelas);
    }
    function index() {
        
    }
}
