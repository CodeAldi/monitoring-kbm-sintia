@extends('layouts.dashboard')
@section('content')
<div class="card mb-2">
    <div class="card-body">
        <h5 class="card-title">pembagian untuk group/rombel : {{ $rombel->nama_group_rombongan_belajar }}</h5>
    </div>
</div>
@if ($datapembagian)
    
<div class="card mb-2">
    <div class="card-body">
        <p class="card-title">Siswa yg sudah ada di rombel ini :</p>
        <div class="row">
            @forelse ($datapembagian as $item)
            <div class="col-6">{{ $loop->iteration }}) nis {{ $item->siswa_id }}, {{ $item->siswa->nama }}</div>
                
            @empty
            <div class="col bg-warning rounded-pill text-center text-white">Masih Kosong</div>
            @endforelse
        </div>
    </div>
</div>   
@endif
<div class="card">
    <div class="card-body">
        <p class="card-title mb-2">Pilih siswa untuk rombel ini :</p>
        <form action="{{ route('pembagian-rombel.store') }}" method="post">
            @csrf
            <input type="text" value="{{ $rombel->id }}" name="rombel" hidden readonly>
            <div class="row">

                @forelse ($datasiswa as $item)
                <div class="form-check mt-3 col-4">
                    <input class="form-check-input" name="siswa-{{ $loop->iteration }}" type="checkbox" value="{{ $item->nis }}" id="{{ $item->nis }}" />
                    <label class="form-check-label" for="{{ $item->nis }}"> {{ $item->nis }} - {{ $item->nama }}
                    </label>
                </div>
                @empty
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                    <label class="form-check-label" for="defaultCheck1"> Unchecked </label>
                </div>
                @endforelse
            </div>
            <div class="row mt-2 ">
                <button type="Reset" class="btn btn-secondary col-5 me-1">Reset</button>
                <button type="submit" class="btn btn-success col-6 ms-5">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection