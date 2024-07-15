@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title text-center">Lapor Proses Kegiatan Belajar Mengajar</h5>
    </div>
</div>
<div class="row mt-2 g-2">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <p class="card-text">{{ $penugasan->mapel->nama_mapel }}</p>
                <p class="card-text">{{ $penugasan->kelas->nama_kelas }}</p>
                <p class="card-text">{{ $jam_start_mengajar->toTimeString() }} -- {{
                    $jam_end_mengajar->toTimeString() }} wib</p>
                @if ($laporankbmharian)
                <p class="card-text">status : <span class="badge bg-label-primary">{{ $laporankbmharian[0]->status }}
                    </span></p>
                @else
                <p class="card-text">status : No Data</p>
                @endif
            </div>
        </div>
        @if ($laporankbmharian[0]->status == 'has-not-started-yet')
        <form action="{{ route('laporkbm.lapor.mulaikbm',['laporankbmharian'=>$laporankbmharian[0]]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-success mt-3 w-100">Mulai</button>
        </form>
        @elseif (($laporankbmharian[0]->pembukaan == 'finished')&& ($laporankbmharian[0]->isi == 'finished')&&($laporankbmharian[0]->penutup == 'finished'))
        <button data-bs-toggle="modal" data-bs-target="#tutuplaporankbm" class="btn btn-primary mt-3 w-100" >Konfirmasi Selesai</button>
        @else
        <button class="btn btn-primary mt-3 w-100" disabled>Sedang berlangsung</button>
        @endif
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
                                <td><span class="badge bg-label-secondary">no data</span></td>
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
                                <td>
                                    @if ($laporankbmharian[0]->pembukaan == 'has-not-started-yet')
                                    <span class="badge bg-label-secondary">{{ $laporankbmharian[0]->pembukaan }}</span>
                                    @elseif ($laporankbmharian[0]->pembukaan == 'ongoing')
                                    <span class="badge bg-label-primary">{{ $laporankbmharian[0]->pembukaan }}</span>
                                    @elseif ($laporankbmharian[0]->pembukaan == 'finished')
                                    <span class="badge bg-label-success">{{ $laporankbmharian[0]->pembukaan }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row g-2">
                                        @if ($laporankbmharian[0]->status == 'started')
                                        <form
                                            action="{{ route('laporkbm.lapor.mulai.pembukaan',['laporankbmharian'=>$laporankbmharian[0]]) }}"
                                            method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success rounded-pill">Konfirmasi
                                                Mulai</button>
                                        </form>
                                        @elseif ($laporankbmharian[0]->pembukaan == 'ongoing')
                                        <form
                                            action="{{ route('laporkbm.lapor.selesai.pembukaan',['laporankbmharian'=>$laporankbmharian[0]]) }}"
                                            method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary rounded-pill">Konfirmasi
                                                Selesai</button>
                                        </form>
                                        @elseif ($laporankbmharian[0]->pembukaan == 'finished')
                                        <button class="btn btn-success rounded-pill" disabled>selsai</button>
                                        @else
                                        <button class="btn btn-secondary rounded-pill" disabled>belum mulai</button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>proses penyampaian materi / kegiatan inti kbm</td>
                                <td>
                                    @if ($laporankbmharian[0]->isi == 'has-not-started-yet')
                                    <span class="badge bg-label-secondary">{{ $laporankbmharian[0]->isi }}</span>
                                    @elseif ($laporankbmharian[0]->isi == 'ongoing')
                                    <span class="badge bg-label-primary">{{ $laporankbmharian[0]->isi }}</span>
                                    @elseif ($laporankbmharian[0]->isi == 'finished')
                                    <span class="badge bg-label-success">{{ $laporankbmharian[0]->isi }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row g-2">
                                        @if ($laporankbmharian[0]->isi == 'has-not-started-yet')
                                        <button class="btn btn-secondary rounded-pill" disabled>belum mulai</button>    
                                        @elseif ($laporankbmharian[0]->isi == 'ongoing')
                                        <form action="{{ route('laporkbm.lapor.selesai.isi',['laporankbmharian'=>$laporankbmharian[0]]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary rounded-pill">Konfirmasi
                                                Selesai</button>
                                        </form>
                                        @elseif ($laporankbmharian[0]->isi == 'finished')
                                            
                                        <button class="btn btn-success rounded-pill" disabled>Selesai</button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>rangkuman dan menutup KBM</td>
                                <td>
                                    @if ($laporankbmharian[0]->penutup == 'has-not-started-yet')
                                    <span class="badge bg-label-secondary">{{ $laporankbmharian[0]->penutup }}</span>
                                    @elseif ($laporankbmharian[0]->penutup == 'ongoing')
                                    <span class="badge bg-label-primary">{{ $laporankbmharian[0]->penutup }}</span>
                                    @elseif ($laporankbmharian[0]->penutup == 'finished')
                                    <span class="badge bg-label-success">{{ $laporankbmharian[0]->penutup }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row g-2">
                                        @if ($laporankbmharian[0]->penutup == 'has-not-started-yet')
                                        <button class="btn btn-secondary rounded-pill" disabled>belum mulai</button>
                                        @elseif ($laporankbmharian[0]->penutup == 'ongoing')
                                        <form action="{{ route('laporkbm.lapor.selesai.penutup',['laporankbmharian'=>$laporankbmharian[0]]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary rounded-pill">Konfirmasi
                                                Selesai</button>
                                        </form>
                                        @elseif ($laporankbmharian[0]->penutup == 'finished')
                                        
                                        <button class="btn btn-success rounded-pill" disabled>Selesai</button>
                                        @endif
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
{{-- start modal konfirmasi selesai laporan kbm --}}
<div class="modal fade" id="tutuplaporankbm" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBackdrop" class="form-label">Name</label>
                        <input type="text" id="nameBackdrop" class="form-control" placeholder="Enter Name" />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailBackdrop" class="form-label">Email</label>
                        <input type="text" id="emailBackdrop" class="form-control" placeholder="xxxx@xxx.xx" />
                    </div>
                    <div class="col mb-0">
                        <label for="dobBackdrop" class="form-label">DOB</label>
                        <input type="text" id="dobBackdrop" class="form-control" placeholder="DD / MM / YY" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
{{-- end modal konfirmasi selesai laporan kbm --}}
@endsection