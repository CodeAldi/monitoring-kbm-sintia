@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <h5 class="card-title flex-grow-1">
                List Data Guru dan absensi 
            </h5>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCreate">Buat form absen</button>
        </div>
    </div>
</div>
@endsection