<?php

namespace App\Http\Controllers;

use App\Models\GuruMapel;
use App\Models\JadwalMengajar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        if (Auth()->user()->hasRole('guru mapel')) {
            $dataGuruMapel = GuruMapel::where('users_id', Auth()->user()->id)->get();
            $dataJadwalMengajar[] = [];
            if (count($dataGuruMapel)) {
                foreach ($dataGuruMapel as $key => $value) {
                    $dataJadwalMengajar[$key] = JadwalMengajar::where('guru_mapel_id', $value->id)->get();
                }
                foreach ($dataJadwalMengajar as $key => $value) {
                    foreach ($value as $index => $item) {
                        if ($item->tanggal_mulai == date('Y-m-d')) {
                            $jadwalHariIni[$key][$index] = $item;
                        }
                    }
                }
            }
            if (!isset($jadwalHariIni)) {
                $jadwalHariIni = [];
            }
            $sekarangHari = Carbon::parse(now())->translatedFormat('l, d F Y');
            return view('dashboard.home')->with('title', 'Dashboard')->with('jadwalHariIni', $jadwalHariIni)->with('sekarangHari', $sekarangHari);
        } else {
            return view('dashboard.home')->with('title', 'Dashboard');
        }
    }
}
