<?php

namespace App\Http\Controllers;

use DatePeriod;
use DateInterval;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use App\Models\JadwalPiketGuru;
use App\Models\EventJadwalPiketGuru;

class JadwalPiketGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = User::where('role', UserRole::GuruMapel)->get();
        $eventPiket = EventJadwalPiketGuru::all();
        if (count($eventPiket)) {
            foreach ($eventPiket as $value) {
                $events[] = [
                    'id' => $value->id,
                    'title' => $value->title,
                    'start' => $value->start,
                    'end' => $value->end,
                ];
            }
        } else {
            $events[] = [];
        }

        return view('jadwalPiket.index')->with('title', 'jadwal piket guru')->with('guru', $guru)->with('events', $events);
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
        $start_date = date_create($request->tanggal_mulai);
        $end_date = date_create($request->tanggal_selesai);
        $date_range = new DatePeriod($start_date, $interval, $end_date);
        foreach ($date_range as $date) {
            $eventJadwalGuruPiket = new EventJadwalPiketGuru();
            $start = $date->format('Y-m-d');
            $end = $date->format('Y-m-d');
            $eventJadwalGuruPiket->title = 'kosong';
            $eventJadwalGuruPiket->start = $start;
            $eventJadwalGuruPiket->end = $end;
            $eventJadwalGuruPiket->save();

            $jadwalPiketGuru = new JadwalPiketGuru();
            $jadwalPiketGuru->users_id = $request->user_id;
            $jadwalPiketGuru->event_jadwal_piket_guru_id = $eventJadwalGuruPiket->id;
            $jadwalPiketGuru->tanggal_mulai = $request->tanggal_mulai;
            $jadwalPiketGuru->tanggal_selesai = $request->tanggal_selesai;
            $jadwalPiketGuru->save();

            $eventJadwalGuruPiket->title = $jadwalPiketGuru->user->name;
            $eventJadwalGuruPiket->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalPiketGuru $jadwalPiketGuru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalPiketGuru $jadwalPiketGuru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalPiketGuru $jadwalPiketGuru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $jadwalPiketGuruTemp = JadwalPiketGuru::where('event_jadwal_piket_guru_id', $request->event_id)->get();
        $jadwalPiketGuru = JadwalPiketGuru::where('users_id', $jadwalPiketGuruTemp[0]->users_id)->get();
        // dd($jadwalPiketGuru[0]->event_jadwal_piket_guru);
        foreach ($jadwalPiketGuru as $value) {
            $value->event_jadwal_piket_guru->delete();
            $value->delete();
        }
        return back();
    }
}
