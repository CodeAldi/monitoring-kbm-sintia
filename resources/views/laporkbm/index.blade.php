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
        <form action="{{ route('laporkbm.lapor.mulai',['laporankbmharian'=>$laporankbmharian[0]]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-success mt-3 w-100">Mulai</button>
        </form>
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
                                        <button class="btn btn-primary rounded-pill">Konfirmasi Selesai</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>rangkuman dan menutup KBM</td>
                                <td><span class="badge bg-label-secondary">belum mulai</span></td>
                                <td>
                                    <div class="row g-2">
                                        <button class="btn btn-secondary rounded-pill" disabled>konfrimasi
                                            Selesai</button>
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