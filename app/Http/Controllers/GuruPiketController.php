<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuruPiketController extends Controller
{
    function BerandaPiketView() {
        // $user = User::find(Auth()->user()->id);
        // dd(Auth()->user());
        return view('gurupiket.beranda')->with('title','Guru Piket');
    }
}
