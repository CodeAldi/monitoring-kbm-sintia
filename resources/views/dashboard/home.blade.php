@extends('layouts.dashboard')
@section('content')
@if (Auth()->user()->hasRole('admin'))
<div class="row mb-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Selamat Datang <strong>{{ Auth()->user()->name }}</strong>, rekap data
                    admin sistem informasi monitoring : </h5>
            </div>
        </div>
    </div>
    <div class="col-md-4" >
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <strong> {{ $sekarangHari }} </strong>
                </h5>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mapel : {{ $mapel }} </h5>

            </div>
        </div>
    </div>
    <div class="col">
        <div class="card card-body">
            <h5 class="card-title">Jurusan : {{ $jurusan }} </h5>
        </div>
    </div>
    <div class="col">
        <div class="card card-body">
            <h5 class="card-title">Kelas : {{ $kelas }} </h5>
        </div>
    </div>
    <div class="col">
        <div class="card card-body">
            <h5 class="card-title">Guru : {{ $guru }} </h5>
        </div>
    </div>
    <div class="col">
        <div class="card card-body">
            <h5 class="card-title">Siswa : {{ $siswa }} </h5>
        </div>
    </div>
</div>
{{-- memnuculkan baris khusus admin --}}
@elseif (Auth()->user()->hasRole('wakil kurikulum'))
{{-- baris kode khusus wakur --}}
<div class="row mb-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Selamat Datang <strong>{{ Auth()->user()->name }}</strong>, berikut rekap data monitoring kbm hari ini : </h5>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <strong> {{ $sekarangHari }} </strong>
                </h5>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Guru piket hari ini : </h5>
                <div class="card-text">
                    <ol>
                        @forelse ($gurupiket as $item)
                        <li>{{ $item->title }}</li>
                        @empty
                        {{-- <li>Data masih kosong atau sekarang bukan hari kerja</li> --}}
                        @endforelse
                    </ol>
                </div>
            </div>
            
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <strong> Absensi Guru </strong>
                </h5>
            </div>
            <div class="card-body border mx-3 mb-2 p-2 ">
                data kosong
            </div>
        </div>
    </div>
</div>
@elseif (Auth()->user()->hasRole('guru mapel'))
{{-- baris kode khusus guru mapel --}}
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Selamat Datang <strong>{{ Auth()->user()->name }}</strong>, jadwal
                    mengajar anda hari ini adalah : </h5>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <strong> {{ $sekarangHari }} </strong>
                </h5>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    @forelse ($jadwalHariIni as $item)
    @foreach ($item as $value)
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <div class="list-group list-group-numbered">
                    <div class="list-group-item">{{ $value->kelas->nama_kelas.', pukul '.date('H:i
                        T',strtotime($value->event_jadwal_mengajar->start)).' - '.date('H:i
                        T',strtotime($value->event_jadwal_mengajar->end))}}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @empty
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">
                    Tidak Ada Jadwal Mengajar Hari Ini
                </h5>
            </div>
        </div>
    </div>
    @endforelse
</div>
@elseif (Auth()->user()->hasRole('guru piket'))
<div class="row mb-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Selamat Datang <strong>{{ Auth()->user()->name }}</strong> dihalaman guru piket </h5>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <strong> {{ $sekarangHari }} </strong>
                </h5>
            </div>
        </div>
    </div>
</div>
{{-- baris kode khusus guru piket --}}
@endif
@endsection