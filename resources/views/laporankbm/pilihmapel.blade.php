@extends('layouts.dashboard')
@section('content')
<div class="card text-center mb-2">
    <div class="card-body">List Mata Pelajaran di kelas : <strong> @if (count($mapel))
        {{ $mapel[0]->kelas->nama_kelas }} @else 'tidak ada data jadwal pelajaran'
    @endif </strong></div>
</div>
<div class="card">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>Guru</th>
                <th class="text-center">aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mapel as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->mapel->nama_mapel }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td class="text-center">
                        <form action="{{ route('laporankbm.index',['kelas'=>$item->id]) }}" method="post">
                            @csrf
                            <input type="text" name="mapelid" value="{{ $item->id }}" hidden readonly>
                            <button type="submit" class="btn btn-success">Lihat Laporan</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center bg-warning text-white"> data jadwal pelajaran masih kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection