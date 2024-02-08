<?php

namespace App\Http\Controllers;

use App\Models\EventJadwalMengajar;
use App\Models\GuruMapel;
use App\Models\JadwalMengajar;
use App\Models\Kelas;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;

class JadwalMengajarController extends Controller
{
    function pilihkelas()
    {
        $kelas = Kelas::all();
        return view('jadwalmengajar.pilihkelas')->with('title', 'Pilih Kelas')->with('kelas', $kelas);
    }
    /**
     * Display a listing of the resource.
     */
    public function index($kelas)
    {
        $kelas = Kelas::find($kelas);
        $gurudanmapel = GuruMapel::where('kelas_id', $kelas->id)->get();
        $jadwalMengajar = JadwalMengajar::where('kelas_id', $kelas->id)->get();
        // dd($gurudanmapel);
        if (count($jadwalMengajar)) {
            foreach ($jadwalMengajar as $value) {
                $events[] = [
                    'id' => $value->event_jadwal_mengajar->id,
                    'title' => $value->event_jadwal_mengajar->title,
                    'start' => $value->event_jadwal_mengajar->start,
                    'end' => $value->event_jadwal_mengajar->end,
                ];
            }
        } else {
            $events[] = [];
        }
        return view('jadwalmengajar.index')->with('title', 'Jadwal Mengajar Guru')->with('kelas', $kelas)->with('gurudanmapel', $gurudanmapel)->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $interval = new DateInterval('P1W');
        $start_date = date_create($request->tanggal_awal);
        $end_date = date_create($request->tanggal_selesai);
        $date_range = new DatePeriod($start_date, $interval, $end_date);
        // dd($date->format('Y-m-d'));
        foreach ($date_range as $date) {
            $gurudanmapel = GuruMapel::find($request->guru_mapel_id);
            $title = $gurudanmapel->mapel->nama_mapel;
            $start = $date->format('Y-m-d') . 'T' . $request->jam_mulai;
            $end = $date->format('Y-m-d') . 'T' . $request->jam_selesai;
            $event = new EventJadwalMengajar();
            $event->title = $title;
            $event->start = $start;
            $event->end   = $end;
            $event->save();

            $jadwalMengajar = new JadwalMengajar();
            $jadwalMengajar->event_jadwal_mengajar_id = $event->id;
            $jadwalMengajar->guru_mapel_id = $gurudanmapel->id;
            $jadwalMengajar->kelas_id = $gurudanmapel->kelas_id;
            $jadwalMengajar->tanggal_mulai = $request->tanggal_awal;
            $jadwalMengajar->tanggal_selesai = $request->tanggal_selesai;
            $jadwalMengajar->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalMengajar $jadwalMengajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalMengajar $jadwalMengajar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalMengajar $jadwalMengajar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $jadwalMengajarTemp = JadwalMengajar::where('event_jadwal_mengajar_id', $request->event_id)->get();
        $jadwalMengajar = JadwalMengajar::where('guru_mapel_id', $jadwalMengajarTemp[0]->guru_mapel_id)->get();

        // dd($jadwalMengajar);
        foreach ($jadwalMengajar as $value) {
            $value->event_jadwal_mengajar->delete();
            $value->delete();
        }
        return back();
    }
}
