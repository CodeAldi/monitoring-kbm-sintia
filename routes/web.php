<?php

use App\Http\Controllers\AbsensiHarianGuruController;
use App\Http\Controllers\AbsensiHarianSiswaController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruMapelController;
use App\Http\Controllers\GuruPiketController;
use App\Http\Controllers\JadwalMengajarController;
use App\Http\Controllers\JadwalPiketGuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanKbmController;
use App\Http\Controllers\LaporProsesKbmController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PantauKbmController;
use App\Http\Controllers\PembagianRombelSiswaController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\RppController;
use App\Http\Controllers\SiswaController;
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
Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth')->name('dashboard');
Route::get('/rolepiket',[DashboardController::class, 'ChangeRoleToPiket'])->middleware(['auth', 'role:guru mapel'])->name('ChangeRoleToPiket');
Route::get('/rolemapel',[DashboardController::class, 'ChangeRoleToMapel'])->middleware(['auth', 'role:guru piket'])->name('ChangeRoleToMapel');

Route::controller(AuthenticationController::class)->group(function(){
    Route::get('/','index')->middleware('guest')->name('login');
    Route::post('/login', 'authenticate')->middleware('guest')->name('authenticate');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});
Route::controller(MapelController::class)->middleware(['auth','role:admin'])->group(function(){
    Route::get('data-master/mata-pelajaran/index','index')->name('mapel.index');
    Route::post('data-master/mata-pelajaran/store','store')->name('mapel.store');
    Route::put('data-master/mata-pelajaran/{mapel}/update','update')->name('mapel.update');
    Route::delete('data-master/mata-pelajaran/{mapel}/destroy','destroy')->name('mapel.destroy');
    Route::get('data-master/mata-pelajaran/template','template')->name('mapel.template');
});
Route::controller(SiswaController::class)->middleware(['auth', 'role:admin'])->group(function(){
    Route::get('data-master/siswa/index','index')->name('siswa.index');
    Route::post('data-master/siswa/store','store')->name('siswa.store');
    Route::post('data-master/siswa/import','import')->name('siswa.import');
    Route::get('data-master/siswa/template','template')->name('siswa.template');
});
Route::controller(JurusanController::class)->middleware(['auth', 'role:admin'])->group(function(){
    Route::get('data-master/jurusan/index','index')->name('jurusan.index');
    Route::post('data-master/jurusan/store', 'store')->name('jurusan.store');
    Route::put('data-master/jurusan/{jurusan}/update', 'update')->name('jurusan.update');
    Route::delete('data-master/jurusan/{jurusan}/destroy', 'destroy')->name('jurusan.destroy');
});
Route::controller(KelasController::class)->middleware(['auth', 'role:admin'])->group(function(){
    Route::get('data-master/kelas/index','index')->name('kelas.index');
    Route::post('data-master/kelas/store', 'store')->name('kelas.store');
    Route::put('data-master/kelas/{kelas}/update', 'update')->name('kelas.update');
    Route::delete('data-master/kelas/{kelas}/destroy', 'destroy')->name('kelas.destroy');
});
Route::controller(UserGuruController::class)->middleware(['auth', 'role:admin'])->group(function(){
    Route::get('data-master/akun/guru/index','index')->name('akun.guru.index');
    Route::post('data-master/akun/guru/store','store')->name('akun.guru.store');
    Route::put('data-master/akun/guru/{guru}/update', 'update')->name('akun.guru.update');
    Route::delete('data-master/akun/guru/{guru}/destroy', 'destroy')->name('akun.guru.destroy');
});
Route::controller(GuruMapelController::class)->middleware(['auth','role:wakil kurikulum'])->group(function(){
    Route::get('pembagian-tugas-mengajar/guru-mapel/index','index')->name('gurumapel.index');
    Route::post('pembagian-tugas-mengajar/guru-mapel/store','store')->name('gurumapel.store');
    Route::put('pembagian-tugas-mengajar/guru-mapel/{guruMapel}/update','update')->name('gurumapel.update');
    Route::delete('pembagian-tugas-mengajar/guru-mapel/{guruMapel}/destroy','destroy')->name('gurumapel.destroy');
});

Route::controller(JadwalMengajarController::class)->middleware(['auth', 'role:wakil kurikulum'])->group(function(){
    Route::get('jadwal-pelajaran/pilih-kelas','pilihkelas')->name('jadwalmengajar.pilihkelas');
    Route::get('jadwal-pelajaran/{kelas}','index')->name('jadwalmengajar.index');
    Route::post('jadwal-pelajaran/store','store')->name('jadwalmengajar.store');
    Route::post('jadwal-pelajaran/delete','destroy')->name('jadwalmengajar.delete');
});
Route::controller(RombelController::class)->middleware(['auth', 'role:wakil kurikulum'])->group(function () {
    Route::get('rombel/index','index')->name('rombel.index');
    Route::post('rombel/store','store')->name('rombel.store');
});
Route::controller(PembagianRombelSiswaController::class)->middleware(['auth', 'role:wakil kurikulum'])->group(function(){
    Route::get('pembagian-kelas','index')->name('pembagian-kelas.index');
    Route::get('pembagian-rombel/{rombel}/create','create')->name('pembagian-rombel.create');
    Route::post('pembagian-rombel/store','store')->name('pembagian-rombel.store');
    Route::post('pembagian-rombel-kelas/store', 'rombelKelasStore')->name('pembagianRombelKelas.store');
});
Route::controller(LaporanKbmController::class)->middleware(['auth', 'role:wakil kurikulum'])->group(function(){
    Route::get('laporan-kbm/pilih-kelas','pilihkelas')->name('laporankbm.pilihkelas');
    Route::get('laporan-kbm/{kelas}/pilih-mapel','pilihmapel')->name('laporankbm.pilihmapel');
    Route::post('laporan-kbm/{kelas}/render','index')->name('laporankbm.index');
});

Route::controller(JadwalPiketGuruController::class)->middleware(['auth', 'role:wakil kurikulum'])->group(function(){
    Route::get('jadwal-piket/index','index')->name('jadwalpiket.index');
    Route::post('jadwal-piket/store','store')->name('jadwalpiket.store');
    Route::post('jadwal-piket/delete','destroy')->name('jadwalpiket.delete');
});
Route::controller(AbsensiHarianGuruController::class)->middleware(['auth', 'role:wakil kurikulum'])->group(function () {
    Route::get('absensi-harian-guru/index','index')->name('absensiharianguru.index');
    Route::get('absensi-harian-guru/create', 'formAbsensiCreate')->name('absensiharianguru.create');
    Route::post('absensi-harian-guru/store','formAbsensiStore')->name('absensiharianguru.store');
});
Route::controller(AbsensiHarianGuruController::class)->middleware(['auth', 'role:guru mapel'])->group(function () {
    Route::get('ambil-absensi-harian-guru/index','AmbilAbsenGuruCreate')->name('ambilabsen.index');
    Route::post('ambil-absen-harian-guru/store','AmbilAbsenGuruStore')->name('ambilabsen.store');
});

Route::controller(PantauKbmController::class)->middleware(['auth', 'role:wakil kurikulum'])->group(function(){
    Route::get('pantau-kbm/list-kelas','indexKelas')->name('pantaukbm.listkelas');
});
Route::controller(PantauKbmController::class)->middleware(['auth', 'role:guru piket'])->group(function(){
    Route::get('/piket/pantau-kbm/list-kelas','indexKelas')->name('piket.listkelas');
});

Route::controller(AbsensiHarianSiswaController::class)->middleware(['auth', 'role:guru mapel'])->group(function(){
    Route::get('absen-siswa/index','index')->name('absensiswa.index');
    Route::post('absen-suswa/store','store')->name('absensiswa.store');
});

Route::controller(RppController::class)->middleware(['auth', 'role:guru mapel'])->group(function(){
    Route::get('rpp/index','index')->name('rpp.index');
    Route::get('rpp/tingkat-kelas/{tingkatKelas}/create','create')->name('rpp.create');
    Route::post('rpp/store','store')->name('rpp.store');
    Route::post('rpp/delete','destroy')->name('rpp.delete');
});

Route::controller(LaporProsesKbmController::class)->middleware(['auth', 'role:guru mapel'])->group(function(){
    Route::get('lapor-proses-kbm/pilihkelas','index')->name('laporkbm.index');
    Route::get('lapor-proses-kbm/lapor','lapor')->name('laporkbm.lapor');
    Route::post('lapor-proses-kbm/lapor/{laporankbmharian}/mulaikbm','mulaiKbm')->name('laporkbm.lapor.mulaikbm');
    Route::post('lapor-proses-kbm/lapor/{laporankbmharian}/selesaikbm','selesaiKbm')->name('laporkbm.lapor.selesaikbm');
    Route::post('lapor-proses-kbm/lapor/{laporankbmharian}/mulaipembukaan','mulaiPembukaanKbm')->name('laporkbm.lapor.mulai.pembukaan');
    Route::post('lapor-proses-kbm/lapor/{laporankbmharian}/selesaipembukaan','selesaiPembukaanKbm')->name('laporkbm.lapor.selesai.pembukaan');
    Route::post('lapor-proses-kbm/lapor/{laporankbmharian}/selesaiisi', 'selesaiIsiKbm')->name('laporkbm.lapor.selesai.isi');
    Route::post('lapor-proses-kbm/lapor/{laporankbmharian}/selesaipenutup', 'selesaiPenutupKbm')->name('laporkbm.lapor.selesai.penutup');
});

Route::controller(GuruPiketController::class)->middleware(['auth', 'role:guru mapel'])->group(function(){
    Route::get('guru-piket/beranda','BerandaPiketView')->name('gurupiket.beranda');
});