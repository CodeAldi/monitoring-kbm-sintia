<?php

namespace App\Http\Controllers;

use App\Enums\StatusAbsen;
use App\Enums\StatusKbm;
use App\Enums\UserRole;
use App\Models\AbsensiHarianGuru;
use App\Models\User;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class AbsensiHarianGuruController extends Controller
{
    function index() {
        $usergurunya = User::where('role', UserRole::GuruMapel)->get();
        foreach ($usergurunya as $key => $value) {
            $absensiguru[$value->id]['hadir'] = count(AbsensiHarianGuru::where('users_id',$value->id)->where('status',StatusAbsen::HADIR)->get());
            $absensiguru[$value->id]['sakit'] = count(AbsensiHarianGuru::where('users_id',$value->id)->where('status','sakit')->get());
            $absensiguru[$value->id]['izin'] = count(AbsensiHarianGuru::where('users_id',$value->id)->where('status','izin')->get());
            $absensiguru[$value->id]['alfa'] = count(AbsensiHarianGuru::where('users_id',$value->id)->where('status','alfa')->get());
        }
        // dd($absensiguru);
        
        return view('absenharianguru.index')->with('title','absen harian guru')->with('gurunya',$usergurunya)->with('absennya', $absensiguru);
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

    function AmbilAbsenGuruCreate() {
        $nama = Auth()->user()->name;
        $now = now();
        $dataabsen = AbsensiHarianGuru::whereDate('tanggal_absensi',$now)->where('users_id',Auth()->user()->id)->get();
        // dd($dataabsen[0]->status == 'hadir');
        return view('absenharianguru.ambilabsen.index')->with('title', 'ambil absen')->with('nama',$nama)->with('dataabsen',$dataabsen[0]);
    }
    
    function AmbilAbsenGuruStore(Request $request) {
        $validatedData = $request->validate(
            [
                'catatan','bukti' => 'required',
                'catatan' => 'string',
                'bukti' => 'image',
            ]
        );
        $path = Storage::disk('local')->put('public',$request->bukti);
        $now = now();
        $absen = AbsensiHarianGuru::whereDate('tanggal_absensi', $now)->where('users_id', Auth()->user()->id)->get();
        // dd($absen[0]);
        $absen[0]->status = StatusAbsen::HADIR;
        $absen[0]->bukti = $path;
        $absen[0]->keterangan = $request->catatan;
        $absen[0]->save();
        return redirect()->route('ambilabsen.index');
    }
}
