<?php

namespace App\Http\Controllers;

use App\Enums\StatusAbsen;
use App\Models\AbsensiHarianSiswa;
use App\Models\GuruMapel;
use App\Models\JadwalMengajar;
use App\Models\PembagianRombelKelas;
use App\Models\PembagianRombelSiswa;
use Illuminate\Http\Request;

class AbsensiHarianSiswaController extends Controller
{
    function index() {
        $guruid = Auth()->user()->id;
        $now = date_create('now')->format('Y-m-d ');
        $mapelygdiampu = GuruMapel::where('users_id',$guruid)->get();
        if (count($mapelygdiampu)>0) {
            foreach ($mapelygdiampu as $key => $value) {
                $jadwalmengajar = JadwalMengajar::where('guru_mapel_id',$value->id)->where('tanggal_mulai',$now)->get();
            }
        } else {
            $jadwalmengajar = null;
        }
        $datarombelkelas = PembagianRombelKelas::where('kelas_id', $jadwalmengajar[0]->kelas_id)->get();
        $datasiswa = PembagianRombelSiswa::where('rombongan_belajar_id', $datarombelkelas[0]->rombongan_belajar_id)->get();
        $dataabsen = AbsensiHarianSiswa::where('guru_mapel_id', $mapelygdiampu[0]->id)->get();
        
        // dd($dataabsen);
        return view('absenhariansiswa.index')->with('title','absen siswa')->with('dataabsen',$dataabsen)->with('siswa',$datasiswa)->with('gurumapel',$mapelygdiampu);
    }
    
    function store(Request $request) {
        $data = $request->except('_token','gurumapelid');
        // dd($data);
        foreach ($data as $key => $value) {
            $database[$key] = AbsensiHarianSiswa::upsert([
                'users_id' => $key,
                'guru_mapel_id' => $request->gurumapelid,
                'status' => $value,
            ],['users_id','guru_mapel_id','status']
            );
        }
        // dd($database);
        return redirect()->route('absensiswa.index');
    }
    
}
