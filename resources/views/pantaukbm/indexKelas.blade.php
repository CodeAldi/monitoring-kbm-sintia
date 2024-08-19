@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title text-center">Pantau Kegiatan Belajar Mengajar</h5>
    </div>
</div>

<div class="mt-2">
    <div class="row gx-3">
        @forelse ($listKelas as $itemListKelas)
        <div class="col">
            @forelse ($jadwalMengajar as $itemJadwalMengajar)
            @if ($itemListKelas->id == $itemJadwalMengajar->kelas_id)

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $itemListKelas->nama_kelas }}</h5>
                    <p class="card-subtitle text-center">
                        @foreach ($laporankbm as $itemlaporankbm)
                        @if ($itemlaporankbm[0]->jadwal_mengajar_id == $itemJadwalMengajar->id)

                        <span class="badge bg-label-primary">{{ $itemlaporankbm[0]->status }}</span>
                        @endif
                        @endforeach
                    </p>
                    <table class="card-text mt-2">
                        <tr>
                            <td>Guru</td>
                            <td>:</td>
                            <td>{{ $itemJadwalMengajar->gurumapel->user->name }}</td>
                        </tr>
                        <tr>
                            <td>Mapel</td>
                            <td>:</td>
                            <td>{{ $itemJadwalMengajar->gurumapel->mapel->nama_mapel }}</td>
                        </tr>
                        <tr>
                            <td>jam</td>
                            <td>:</td>
                            <td>{{ date('h:i', strtotime($itemJadwalMengajar->eventmengajar->start)) }} - {{ date('h:i',
                                strtotime($itemJadwalMengajar->eventmengajar->end)) }}</td>
                        </tr>
                        <tr>
                            <td>status</td>
                            <td>:</td>
                            <td>
                                @foreach ($laporankbm as $itemlaporankbm)
                                @if ($itemlaporankbm[0]->jadwal_mengajar_id == $itemJadwalMengajar->id)
                                {{ $itemlaporankbm[0]->status }}
                                @endif
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            @endif
            @empty
            <div class="card mt-2">
                <div class="card-body">
                    <p class="card-text">{{ $itemListKelas->nama_kelas }} : Tidak ada proses kbm yang bisa dipantau hari ini</p>
                </div>
            </div>
            @endforelse
        </div>
        @empty

        @endforelse
    </div>
</div>
@endsection