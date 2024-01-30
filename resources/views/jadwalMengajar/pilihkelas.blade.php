@extends('layouts.dashboard')
@section('content')
<div class="row">
    @forelse ($kelas as $item)
    <div class="col-md-2">
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route('jadwalmengajar.index',['kelas'=>$item->id]) }}" class="btn btn-info">
                    {{ $item->nama_kelas }}
                </a>
            </div>
        </div>
    </div>
    @empty

    @endforelse
</div>
@endsection