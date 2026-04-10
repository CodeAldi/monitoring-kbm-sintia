@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title text-center">Pilih Kelas yang diampu :</h4>
    </div>
</div>
<div class="row mt-4">
    @forelse ($tingkatKelas as $item)
    <div class="col-md">
        <div class="card">
            <div class="card-body d-flex flex-column">
                <div class="card-text text-center mb-3">Kelas {{ $item }}</div>
                <a href="{{ route('rpp.create',['tingkatKelas'=>$item]) }}"
                    class=" btn-lg btn-primary text-center">Pilih&nbsp;<i class='bx bxs-right-arrow-circle'></i></a>
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