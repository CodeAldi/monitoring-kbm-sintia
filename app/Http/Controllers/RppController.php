<?php

namespace App\Http\Controllers;

use App\Models\Rpp;
use App\Models\GuruMapel;
use Illuminate\Http\Request;

class RppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth()->user()->hasRole('guru mapel')) {
            $dataMengajar = GuruMapel::where('users_id', Auth()->user()->id)->get();
            if (count($dataMengajar)) {
                $dataTingkatKelas = array();
                foreach ($dataMengajar as $key => $value) {
                    $dataTingkatKelas[$key] = $value->kelas->tingkat_kelas;
                }
                $TingkatKelasUnique = array_unique($dataTingkatKelas);
            }
            // dd(Auth()->user()->id, $dataTingkatKelas, $TingkatKelasUnique);
            return view('rpp.index')->with('title', 'Rpp | Pilih Kelas')->with('tingkatKelas', $TingkatKelasUnique);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($tingkatKelas)
    {
        $guruMapel = GuruMapel::where('users_id', Auth()->user()->id)->get();
        if (count($guruMapel)) {
            $data = array();
            foreach ($guruMapel as $key => $value) {
                if ($value->kelas->tingkat_kelas == $tingkatKelas) {
                    $data[$key] = $value;
                }
            }
        }
        // dd($data);
        return view('rpp.create')->with('title', 'RPP | Create')->with('data',$data);
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
    public function show(Rpp $rpp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rpp $rpp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rpp $rpp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rpp $rpp)
    {
        //
    }
}
