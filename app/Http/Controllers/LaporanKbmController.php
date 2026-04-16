<?php

namespace App\Http\Controllers;

use App\Models\AbsensiHarianGuru;
use App\Models\GuruMapel;
use App\Models\JadwalMengajar;
use App\Models\Kelas;
use App\Models\lapor_proses_kbm;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


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
        $dataabsenguru = AbsensiHarianGuru::where('users_id', $final[0][0]->jadwal_mengajar->gurumapel->user->id)->get();

        // dd($dataabsenguru[0]->tanggal_absensi == $final[0][0]->tanggal);
        return view('laporankbm.index')->with('title','laporan')->with('data',$final)->with('kelas',$request->kelas)->with('dataabsenguru',$dataabsenguru);
    }

    public function exportPdf(Request $request)
    {
        $jadwalmengajar = JadwalMengajar::where('guru_mapel_id', $request->mapelid)->get();

        foreach ($jadwalmengajar as $key => $value) {
            $final[$key] = lapor_proses_kbm::where('jadwal_mengajar_id', $value->id)->get();
        }

        $dataabsenguru = AbsensiHarianGuru::where(
            'users_id',
            $final[0][0]->jadwal_mengajar->gurumapel->user->id
        )->get();

        $pdf = Pdf::loadView('laporankbm.pdf', [
            'data' => $final,
            'kelas' => $request->kelas,
            'dataabsenguru' => $dataabsenguru
        ]);

        return $pdf->download('laporan-kbm.pdf');
    }
}
