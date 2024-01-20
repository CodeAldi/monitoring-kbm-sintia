<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Enums\UserRole;
use App\Models\GuruMapel;
use Illuminate\Http\Request;

class GuruMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guruMapel = GuruMapel::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $guru = User::where('role', '!=', UserRole::Admin)->where('role', '!=', UserRole::WakilKurikulum)->where('role', '!=', UserRole::Siswa)->get();
        return view('gurumapel.index')->with('guruMapel',$guruMapel)->with('title','Guru Mapel')->with('mapel',$mapel)->with('kelas',$kelas)->with('guru',$guru);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'users_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
        ]);
        $guruMapel = new GuruMapel();
        $guruMapel->users_id = $request->users_id;
        $guruMapel->mapel_id = $request->mapel_id;
        $guruMapel->kelas_id = $request->kelas_id;
        $guruMapel->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(GuruMapel $guruMapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuruMapel $guruMapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GuruMapel $guruMapel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuruMapel $guruMapel)
    {
        //
    }
}
