<?php

namespace App\Http\Controllers;

use App\Models\GuruMapel;
use App\Models\JadwalMengajar;
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
        $jadwalmengajar = JadwalMengajar::find($penugasan);
        $jam_start_mengajar = Carbon::create($jadwalmengajar[0]->eventmengajar->start);
        $jam_end_mengajar = Carbon::create($jadwalmengajar[0]->eventmengajar->end);
        // dd($jam_start_mengajar->toTimeString() .'-'. $jam_end_mengajar->toTimeString());
        return view('laporkbm.index')
            ->with('title', 'Lapor Proses kbm')
            ->with('penugasan', $penugasan)
            ->with('jam_start_mengajar', $jam_start_mengajar)
            ->with('jam_end_mengajar', $jam_end_mengajar);
    }
}
