<?php

namespace App\Http\Controllers;

use App\Models\Rpp;
use App\Models\GuruMapel;
use App\Models\Rpp_items;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

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
            // check data rpp
            $rppid = Rpp::where('guru_mapel_id', Auth()->user()->id)->get('id');
            if (count($rppid)) {
                $datarpp = Rpp_items::where('rpp_id', $rppid[0]->id)->get();
            } else {
                $datarpp = [];
            }
            
            
            $data = array();
            foreach ($guruMapel as $key => $value) {
                if ($value->kelas->tingkat_kelas == $tingkatKelas) {
                    $data[$key] = $value;
                }
            }
        }
        // dd($datarpp);
        return view('rpp.create')->with('title', 'RPP | Create')->with('data',$data)->with('datarpp',$datarpp)->with('rppid',$rppid);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $guruMapelid = GuruMapel::where('users_id', Auth()->user()->id)->get('id')->first();
        $is_exist = rpp::where('guru_mapel_id',$guruMapelid)->first();
        if($is_exist){
            // data rpp ada;
        }
        else{
            // data rpp kosong;
            if ($request->rppid) {
                $rpp_items = new Rpp_items();
                $rpp_items->rpp_id = $request->rppid;
                $rpp_items->pertemuan = 1;
                $rpp_items->kompetensi_dasar = $request->kompetensi_dasar;
                $rpp_items->tujuan_pembelajaran = $request->tujuan_pembelajaran;
                $rpp_items->langkah_pembelajaran_isi = $request->langkah_pembelajaran_isi;
                $rpp_items->assesmen = $request->assesmen;
                $rpp_items->save();

                return back();
            }
            else{
                $rpp = new Rpp();
                $rpp->guru_mapel_id = $guruMapelid->id;
                $rpp->jumlah_pertemuan = 1;
                $rpp->save();
                
                $rpp_items = new Rpp_items();
                $rpp_items->rpp_id = $rpp->id;
                $rpp_items->pertemuan = 1;
                $rpp_items->kompetensi_dasar = $request->kompetensi_dasar;
                $rpp_items->tujuan_pembelajaran = $request->tujuan_pembelajaran;
                $rpp_items->langkah_pembelajaran_isi = $request->langkah_pembelajaran_isi;
                $rpp_items->assesmen = $request->assesmen;
                $rpp_items->save();
    
                return back();
                
            }

        }
        
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
    public function destroy(Request $request)
    {
        $itemrpp = Rpp_items::find($request->iditemrpp);
        $itemrpp->delete();
        return back();
    }
}
