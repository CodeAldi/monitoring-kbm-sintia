@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title text-center">List kelas yang diampu :</h4>
    </div>
</div>
<div class="row mt-4">
    @forelse ($datakbm as $item)
    <div class="col-md">
        <div class="card">
            <div class="card-body d-flex flex-column">
                <p class="card-text text-center mb-3">Kelas {{ $item->kelas->nama_kelas }} </p>
                <p class="card-text text-center mb-3">Mata pelajaran {{ $item->mapel->nama_mapel }} </p>
                <form action="{{ route('laporkbm.lapor') }}" method="post">
                    @csrf
                    <input type="hidden" name="idpenugasanguru" value="{{ $item->id }}">
                    <div class="row">

                        <button class="btn btn-primary text-center">Pilih&nbsp;<i class='bx bxs-right-arrow-circle'></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @empty
    <div class="col-md">
        <div class="card">
            <div class="card-body text-center">No Data Found !</div>
        </div>
    </div>
    @endforelse
</div>
@endsection