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
                            <td class="text-capitalize">{{ $nama }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                                @if ($dataabsen->status == 'hadir')
                                <span class="badge bg-label-success">Sudah Absen</span>
                                @elseif($dataabsen->status == 'sakit')
                                <span class="badge bg-label-success">sakit</span>
                                @elseif($dataabsen->status == 'izin')
                                <span class="badge bg-label-secondary">izin</span>
                                @elseif($dataabsen->status == 'cuti')
                                <span class="badge bg-label-secondary">cuti</span>
                                @elseif($dataabsen->status == 'alfa')
                                <span class="badge bg-label-danger">alfa</span>
                                @else
                                <span class="badge bg-label-warning">Belum Absen</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if ($dataabsen->status == 'hadir')
    @elseif($dataabsen->status == 'sakit')
    @elseif($dataabsen->status == 'izin')
    @elseif($dataabsen->status == 'cuti')
    @elseif($dataabsen->status == 'alfa')
    @else
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-text">form ambil absen</h5>
                <form action="{{ route('ambilabsen.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-2 row ">
                        <label for="catatan" class="col-2 col-form-label">catatan : </label>
                        <div class="col-10">
                            <input type="text" id="catatan" name="catatan" class="form-control" placeholder="deskripsi kegiatan pada foto yang diupload">
                        </div>
                    </div>
                    <div class="mt-2 row ">
                        <label for="bukti" class="col-2 col-form-label">bukti/foto : </label>
                        <div class="col-10">
                            <input type="file" id="bukti" name="bukti" accept="image/*" class="form-control">
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col mt-2">
                            <button type="reset" class="btn btn-secondary">reset</button>
                            <button type="submint" class="btn btn-success">Ambil Absen</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

</div>
@endsection