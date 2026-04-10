@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-text text-center">Pilih Kelas</h5>
    </div>
</div>
<div class="row mt-2">
    @forelse ($listkelas as $item)
        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <a href="{{ route('laporankbm.pilihmapel',['kelas'=>$item->id]) }}" class="btn btn-primary">{{ $item->nama_kelas }}</a>
                </div>
            </div>
        </div>
    @empty
        
    @endforelse
</div>
@endsection