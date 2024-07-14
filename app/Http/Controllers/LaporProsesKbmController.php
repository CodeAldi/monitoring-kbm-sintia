<?php

namespace App\Http\Controllers;

use App\Enums\StatusKbm;
use App\Models\GuruMapel;
use App\Models\JadwalMengajar;
use App\Models\lapor_proses_kbm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaporProsesKbmController extends Controller
{
    function index()
    {
        $guruMapel = GuruMapel::where('users_id', Auth()->user()->id)->get();
        // dd($guruMapel[0]->Kelas->nama_kelas);
        return view('laporkbm.pilihkelas')->with('title', 'Lapor Proses KBM')->with('datakbm', $guruMapel);
    }
    function lapor(Request $request)
    {
        $penugasan = GuruMapel::find($request->idpenugasanguru);
        $jadwalmengajar = JadwalMengajar::where('guru_mapel_id',$penugasan->id)->get();
        foreach ($jadwalmengajar as $key => $value) {
            if ($value->tanggal_mulai == date('Y-m-d')){
                $laporankbmharian = lapor_proses_kbm::where('jadwal_mengajar_id',$value->id)->get();                
            }
            else{
                $laporankbmharian[]=[];
            }
        }
        // dd($laporankbmharian);
        $jam_start_mengajar = Carbon::create($jadwalmengajar[0]->eventmengajar->start);
        $jam_end_mengajar = Carbon::create($jadwalmengajar[0]->eventmengajar->end);
        return view('laporkbm.index')
            ->with('title', 'Lapor Proses kbm')
            ->with('penugasan', $penugasan)
            ->with('jam_start_mengajar', $jam_start_mengajar)
            ->with('jam_end_mengajar', $jam_end_mengajar)
            ->with('jadwalmengajar',$jadwalmengajar)
            ->with('laporankbmharian',$laporankbmharian);
    }
    function mulaiKbm($laporanhariankbm) {
        $mulaikbm = lapor_proses_kbm::find($laporanhariankbm);
        $mulaikbm->status = StatusKbm::STARTED;
        $mulaikbm->save();
        return back();
    }
    function mulaiPembukaanKbm($laporanhariankbm) {
        $mulaipembukaan = lapor_proses_kbm::find($laporanhariankbm);
        $mulaipembukaan->status = StatusKbm::ONGOING;
        $mulaipembukaan->pembukaan = StatusKbm::ONGOING;
        $mulaipembukaan->save();
        return back();
    }
    function selesaiPembukaanKbm($laporanhariankbm) {
        $mulaipembukaan = lapor_proses_kbm::find($laporanhariankbm);
        $mulaipembukaan->pembukaan = StatusKbm::FINISHED;
        $mulaipembukaan->save();
        return back();
    }
}
