<?php

namespace App\Http\Controllers;

use App\Enums\StatusKbm;
use App\Models\GuruMapel;
use Illuminate\Http\Request;
use App\Models\JadwalMengajar;
use Illuminate\Support\Carbon;
use App\Models\lapor_proses_kbm;
use App\Models\AbsensiHarianSiswa;

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
                $laporankbmharian[]=null;
            }
        }
        $now = date_create('now')->format('Y-m-d ');
        $dataabsen = AbsensiHarianSiswa::where('guru_mapel_id', $penugasan->id)->whereDate('created_at',$now)->get();
        $hadir = 0;
        $sakit = 0;
        $izin = 0;
        $absent = 0;
        foreach ($dataabsen as $key => $value) {
            if ($value->status == 'hadir') {
                $hadir = $hadir+1;
            } elseif ($value->status == 'sakit') {
                $sakit = $sakit+1;
            } elseif ($value->status == 'izin') {
                $izin = $izin+1;
            } elseif ($value->status == 'alfa') {
                $absent = $absent+1;
            }
        }
        $laporankbmharian[0]->tanggal = $now;
        $laporankbmharian[0]->hadir = $hadir;
        $laporankbmharian[0]->sakit = $sakit;
        $laporankbmharian[0]->izin = $izin;
        $laporankbmharian[0]->absent = $absent;
        $laporankbmharian[0]->save();

        // dd($laporankbmharian[0],$dataabsen);
        $jam_start_mengajar = Carbon::create($jadwalmengajar[0]->eventmengajar->start);
        $jam_end_mengajar = Carbon::create($jadwalmengajar[0]->eventmengajar->end);
        return view('laporkbm.index')
            ->with('title', 'Lapor Proses kbm')
            ->with('penugasan', $penugasan)
            ->with('jam_start_mengajar', $jam_start_mengajar)
            ->with('jam_end_mengajar', $jam_end_mengajar)
            ->with('jadwalmengajar',$jadwalmengajar)
            ->with('laporankbmharian',$laporankbmharian)
            ->with('dataabsen',$dataabsen);
    }
    function mulaiKbm($laporanhariankbm) {
        $mulaikbm = lapor_proses_kbm::find($laporanhariankbm);
        $mulaikbm->status = StatusKbm::STARTED;
        $mulaikbm->save();
        return back();
    }
    function selesaiKbm($laporanhariankbm, Request $request) {
        $selesaikbm = lapor_proses_kbm::find($laporanhariankbm);
        $selesaikbm->status = StatusKbm::FINISHED;
        $selesaikbm->assesment = $request->assesment;
        $selesaikbm->catatan = $request->catatan;
        $selesaikbm->save();
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
        $mulaipembukaan->isi = StatusKbm::ONGOING;
        $mulaipembukaan->save();
        return back();
    }
    function selesaiIsiKbm($laporanhariankbm) {
        $selesaiisikbm = lapor_proses_kbm::find($laporanhariankbm);
        $selesaiisikbm->isi = StatusKbm::FINISHED;
        $selesaiisikbm->penutup = StatusKbm::ONGOING;
        $selesaiisikbm->save();
        return back();
    }
    function selesaiPenutupKbm($laporanhariankbm) {

        $selesaiPenutupKbm = lapor_proses_kbm::find($laporanhariankbm);
        $selesaiPenutupKbm->penutup = StatusKbm::FINISHED;
        $selesaiPenutupKbm->save();
        return back();
    }
}
