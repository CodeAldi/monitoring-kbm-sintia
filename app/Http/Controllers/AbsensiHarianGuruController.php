<?php

namespace App\Http\Controllers;

use App\Models\AbsensiHarianGuru;
use Illuminate\Http\Request;

class AbsensiHarianGuruController extends Controller
{
    function index() {
        return view('absenharianguru.index')->with('title','absen harian guru');
    }

    function formAbsensi(Request $request) {
        // $tanggal_mulai;
        // $tanggal_selesai;
        // $usergurunya;
    }
    
    function store(Request $request) {
        // $absen = new AbsensiHarianGuru();
        // $absen->users_id;
        // $absen->status;
        // $absen->bukti;
        // $absen->keterangan;
        // $absen->tanggal_absensi;
        return back();
    }
}
