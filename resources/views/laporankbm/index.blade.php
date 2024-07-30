@extends('layouts.dashboard')
@section('content')
<div class="row mb-2">
    <div class="col">
        <a href="{{ route('laporankbm.pilihmapel',['kelas'=>$kelas]) }}" class="btn btn-primary">kembali</a>
    </div>
    <div class="col d-flex justify-content-end">
        <a href="#" class="btn btn-success">download pdf</a>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table>
            <tr>
                <td>nama guru</td>
                <td>:</td>
                <td>{{ $data[0][0]->jadwal_mengajar->gurumapel->user->name }}</td>
            </tr>
            <tr>
                <td>mata pelajaran</td>
                <td>:</td>
                <td>{{ $data[0][0]->jadwal_mengajar->gurumapel->mapel->nama_mapel }}</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>{{ $data[0][0]->jadwal_mengajar->gurumapel->kelas->nama_kelas }}</td>
            </tr>
        </table>
        <table class="mt-2 table table-bordered">
            <thead>
                <tr>
                    <th>no</th>
                    <th>tanggal</th>
                    <th>pokok bahasan</th>
                    <th>hasil monitoring</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item[0]->jadwal_mengajar->tanggal_mulai }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection