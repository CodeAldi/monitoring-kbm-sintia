<?php

namespace App\Http\Controllers;

use App\Models\JadwalMengajar;
use App\Models\Kelas;
use App\Models\lapor_proses_kbm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class PantauKbmController extends Controller
{
    function indexKelas() {
        $listKelas = Kelas::all();
        $jadwalMengajar = JadwalMengajar::where('tanggal_mulai', date('Y-m-d'))->get();
        if (count($jadwalMengajar)) {
            foreach ($jadwalMengajar as $key => $value) {
                $laporankbm[] = lapor_proses_kbm::where('jadwal_mengajar_id',$value->id)->get();
            }
        }
        // dd($laporankbm[0][0]);
        return view('pantaukbm.indexKelas')->with('title','Pantau KBM')->with('listKelas',$listKelas)->with('jadwalMengajar',$jadwalMengajar)->with('laporankbm',$laporankbm);
    }
}
