<?php

namespace App\Http\Controllers;

use App\Models\EventJadwalMengajar;
use App\Models\GuruMapel;
use App\Models\JadwalMengajar;
use App\Models\Kelas;
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
        $gurudanmapel = GuruMapel::where('kelas_id', $kelas)->get();
        $jadwalMengajar = JadwalMengajar::where('kelas_id', $kelas)->get();
        // dd(count($jadwalMengajar));
        if (count($jadwalMengajar)) {
            $data = EventJadwalMengajar::get(['id', 'title', 'start', 'end']);
            foreach ($data as $key => $value) {
                $events[] = [
                    'title' => $value->title,
                    'start' => $value->start,
                    'end' => $value->end,
                ];
            }
        } else {
            $events[] = [];
        }
        return view('jadwalmengajar.index')->with('title', 'Jadwal Mengajar Guru')->with('gurudanmapel', $gurudanmapel)->with('events', $events);
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
        $gurudanmapel = GuruMapel::find($request->guru_mapel_id);
        $title = $gurudanmapel->mapel->nama_mapel;
        $start = $request->tanggal_awal . 'T' . $request->jam_mulai;
        $end = $request->tanggal_awal . 'T' . $request->jam_selesai;
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
    public function destroy(JadwalMengajar $jadwalMengajar)
    {
        //
    }
}
