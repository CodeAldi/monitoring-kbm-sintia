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
    function index(Request $request) {
        $jadwalmengajar = JadwalMengajar::where('guru_mapel_id',$request->mapelid)->get();
        if (count($jadwalmengajar)>1) {
            foreach ($jadwalmengajar as $key => $value) {
                $final[$key] = lapor_proses_kbm::where('jadwal_mengajar_id',$value->id)->get(); 
            }
        }
        // dd($final[0][0]->jadwal_mengajar->gurumapel->user->name);
        return view('laporankbm.index')->with('title','laporan')->with('data',$final)->with('kelas',$request->kelas);
    }
}
