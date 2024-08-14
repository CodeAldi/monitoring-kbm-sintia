<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\AbsensiHarianGuru;
use App\Models\User;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AbsensiHarianGuruController extends Controller
{
    function index() {
        $usergurunya = User::where('role', UserRole::GuruMapel)->get();
        
        return view('absenharianguru.index')->with('title','absen harian guru')->with('gurunya',$usergurunya);
    }

    function formAbsensiCreate() {
        return view('absenharianguru.create')->with('title', 'Form pembuatan absensi baru (per-semester)');
    }
    function formAbsensiStore(Request $request) {
        $validatedData = $request->validate([
            'mulai',
            'selesai' => 'required|date'
        ]);
        $tanggal_mulai = new DateTime($request->mulai);
        $tanggal_selesai = new DateTime($request->selesai);
        $interval = DateInterval::createFromDateString('1 day');
        $usergurunya = User::where('role',UserRole::GuruMapel)->get();
        // dd($usergurunya[0]);
        $rentang = new DatePeriod($tanggal_mulai,$interval,$tanggal_selesai);
        foreach ($rentang as $key => $value) {
            
            $hari = strtolower($value->format('l'));
            if ($hari == 'saturday' || $hari == 'sunday') {
                $catatan[$key] = 'sekarang sabtu atau minggu';
            } else {
                foreach ($usergurunya as $perulangan => $isi) {
                    $absen = new AbsensiHarianGuru();
                    $absen->users_id = $isi->id;
                    $absen->tanggal_absensi = $value;
                    $absen->save();
                }
            }
            
        }
        // dd($catatan);
        return redirect()->route('absensiharianguru.index');
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
