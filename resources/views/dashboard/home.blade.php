@extends('layouts.dashboard')
@section('content')
@if (Auth()->user()->hasRole('admin'))
{{-- memnuculkan baris khusus admin --}}
@elseif (Auth()->user()->hasRole('wakil kurikulum'))
{{-- baris kode khusus wakur --}}
@elseif (Auth()->user()->hasRole('guru mapel'))
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Selamat Datang <strong>{{ Auth()->user()->name }}</strong>, jadwal
                    mengajar anda hari ini adalah : </h5>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
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
{{-- baris kode khusus guru piket --}}
@endif
@endsection