<?php

namespace App\Http\Controllers;

use App\Models\PembagianRombelSiswa;
use App\Models\Rombel;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PembagianRombelSiswaController extends Controller
{
    function index()
    {
        return view('pembagianrombel.index')->with('title', 'pembagian kelas berdasarkan rombel');
    }
    function create($rombel)
    {
        $rombel = Rombel::find($rombel);
        $siswa = Siswa::all();
        // $ada = PembagianRombelSiswa::where('siswa_id',$siswa[0]->id)->count();
        $i=0;
        foreach ($siswa as $key => $value) {
            if (!(PembagianRombelSiswa::where('siswa_id', $value->id)->count())>0) {
                $siswabelumadarombel[$key] = $value;
            } else {
                $siswasudahadarombel[$key] = $value;
            }
            
        }
        // dd(PembagianRombelSiswa::where('siswa_id', $siswa[1]->id)->count() >0,$siswa[1]->id);
        // dd($siswabelumadarombel,$siswasudahadarombel);
        $datapembagian = PembagianRombelSiswa::where('rombongan_belajar_id', $rombel->id)->get();
        if (count($datapembagian) > 0) {
            // dd('lebih dari 0');
            // $sudahadarombel = $datapembagian
        }
        return view('pembagianrombel.create')->with('title', 'penentuan rombel siswa')->with('rombel', $rombel)->with('datasiswa', $siswabelumadarombel)->with('datapembagian',$datapembagian);
    }
    function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'siswa' => 'required',
        // ]);
        $datasiswa = $request->except(['_token', 'rombel']);
        if (count($datasiswa) == 0) {
            return back();
        }
        $rombel = $request->rombel;
        foreach ($datasiswa as $key => $value) {
            $pembagianrombel = new PembagianRombelSiswa();
            $pembagianrombel->siswa_id = $value;
            $pembagianrombel->rombongan_belajar_id = $rombel;
            $pembagianrombel->save();
        }
        // dd($datasiswa, $rombel);
        return redirect()->route('rombel.index');
    }
}
