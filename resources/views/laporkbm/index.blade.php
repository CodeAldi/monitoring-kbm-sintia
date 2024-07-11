@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title text-center">Lapor Proses Kegiatan Belajar Mengajar</h5>
    </div>
</div>
<div class="row mt-2 g-2">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Mata Pelajaran : {{ $penugasan->mapel->nama_mapel }}</p>
                <p class="card-text">kelas : {{ $penugasan->kelas->nama_kelas }}</p>
                <p class="card-text">Jam Mengajar : {{ $jam_start_mengajar->toTimeString() }} -- {{ $jam_end_mengajar->toTimeString() }} wib</p>
                <p class="card-text">status : Belum dimulai</p>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>komponen</th>
                                <th>status</th>
                                <th>aksi / keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>absen siswa</td>
                                <td><span class="badge bg-label-success">complete</span></td>
                                <td>
                                    {{-- <div class="row g-2">
                                        <div class="btn btn-success rounded-pill">tombol</div>
                                        <div class="btn btn-secondary rounded-pill">tombol</div>
                                        <div class="btn btn-danger rounded-pill">tombol</div>
                                    </div> --}}
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>pembukaan KBM</td>
                                <td><span class="badge bg-label-success">complete</span></td>
                                <td>
                                    <div class="row g-2">
                                        <div class="btn btn-success rounded-pill">tombol</div>
                                        <div class="btn btn-secondary rounded-pill">tombol</div>
                                        <div class="btn btn-danger rounded-pill">tombol</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>proses penyampaian materi / kegiatan inti kbm</td>
                                <td><span class="badge bg-label-success">complete</span></td>
                                <td>
                                    <div class="row g-2">
                                        <div class="btn btn-success rounded-pill">tombol</div>
                                        <div class="btn btn-secondary rounded-pill">tombol</div>
                                        <div class="btn btn-danger rounded-pill">tombol</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>rangkuman dan menutup KBM</td>
                                <td><span class="badge bg-label-success">complete</span></td>
                                <td>
                                    <div class="row g-2">
                                        <div class="btn btn-success rounded-pill">tombol</div>
                                        <div class="btn btn-secondary rounded-pill">tombol</div>
                                        <div class="btn btn-danger rounded-pill">tombol</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection