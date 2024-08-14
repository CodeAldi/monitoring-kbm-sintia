@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Absen kehadiran harian guru</h5>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <table class="tabel">
                    <tbody>
                        <tr>
                            <td>nama</td>
                            <td>:</td>
                            <td>Heri</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><span class="badge bg-label-success">Sudah absen</span></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="p-4"><button disabled type="button" class="btn btn-success">Ambil Absen</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-text">form ambil absen</h5>
                <div class="mt-2 row ">
                    <label for="" class="col-2 col-form-label">catatan : </label>
                    <div class="col-10">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col"></div>
                </div>
                <div class="mt-2 row ">
                    <label for="" class="col-2 col-form-label">bukti/foto : </label>
                    <div class="col-10">
                        <input type="file" class="form-control">
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection