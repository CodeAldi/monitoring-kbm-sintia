@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form pembuatan absensi baru (per-semester)</h5>
    </div>
</div>
<div class="card mt-2">
    <div class="card-body">
        <form action="{{ route('absensiharianguru.store') }}" method="post">
            @csrf
            <div class="row">
                <label class="col-4 col-form-label">Tanggal efektif mengajar dimulai :</label>
                <div class="col">
                    <input type="date" name="mulai" id="mulai" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <label class="col-4 col-form-label">Tanggal efektif mengajar selesai :</label>
                <div class="col">
                    <input type="date" name="selesai" id="selesai" class="form-control">
                </div>
            </div>
            <div class="row mt-3 justify-content-center gap-3">
                <button type="reset" class="btn btn-secondary col-4">Reset</button>
                <button type="submit" class="btn btn-primary col-4">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection