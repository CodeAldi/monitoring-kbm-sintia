<?php

namespace App\Http\Controllers;

use App\Models\GuruMapel;
use App\Models\JadwalMengajar;
use App\Models\Kelas;
use Illuminate\Http\Request;

class JadwalMengajarController extends Controller
{
    function pilihkelas() {
        $kelas = Kelas::all();
        return view('jadwalmengajar.pilihkelas')->with('title','Pilih Kelas')->with('kelas',$kelas);
    }
    /**
     * Display a listing of the resource.
     */
    public function index($kelas)
    {
        $gurudanmapel = GuruMapel::where('kelas_id',$kelas)->get();
        return view('jadwalmengajar.index')->with('title','Jadwal Mengajar Guru')->with('gurudanmapel',$gurudanmapel);
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
        //
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
