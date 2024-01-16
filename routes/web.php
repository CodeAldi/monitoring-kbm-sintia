<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\UserGuruController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard',function(){
    return view('dashboard.home')->with('title','Dashboard');
})->middleware('auth')->name('dashboard');

Route::controller(AuthenticationController::class)->group(function(){
    Route::get('/','index')->middleware('guest')->name('login');
    Route::post('/login', 'authenticate')->middleware('guest')->name('authenticate');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});
Route::controller(MapelController::class)->group(function(){
    Route::get('data-master/mata-pelajaran/index','index')->name('mapel.index');
    Route::post('data-master/mata-pelajaran/store','store')->name('mapel.store');
    Route::put('data-master/mata-pelajaran/{mapel}/update','update')->name('mapel.update');
    Route::delete('data-master/mata-pelajaran/{mapel}/destroy','destroy')->name('mapel.destroy');
})->middleware('auth');
Route::controller(JurusanController::class)->group(function(){
    Route::get('data-master/jurusan/index','index')->name('jurusan.index');
    Route::post('data-master/jurusan/store', 'store')->name('jurusan.store');
    Route::put('data-master/jurusan/{jurusan}/update', 'update')->name('jurusan.update');
    Route::delete('data-master/jurusan/{jurusan}/destroy', 'destroy')->name('jurusan.destroy');
})->middleware('auth');
Route::controller(KelasController::class)->group(function(){
    Route::get('data-master/kelas/index','index')->name('kelas.index');
    Route::post('data-master/kelas/store', 'store')->name('kelas.store');
    Route::put('data-master/kelas/{kelas}/update', 'update')->name('kelas.update');
    Route::delete('data-master/kelas/{kelas}/destroy', 'destroy')->name('kelas.destroy');
})->middleware('auth');
Route::controller(UserGuruController::class)->group(function(){
    Route::get('data-master/akun/guru/index','index')->name('akun.guru.index');
    Route::post('data-master/akun/guru/store','store')->name('akun.guru.store');
    Route::put('data-master/akun/guru/{guru}/update', 'update')->name('akun.guru.update');
    Route::delete('data-master/akun/guru/{guru}/destroy', 'destroy')->name('akun.guru.destroy');

})->middleware('auth');