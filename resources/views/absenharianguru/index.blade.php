@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <h5 class="card-title flex-grow-1">
                List Data Guru dan absensi 
            </h5>
            <a href="{{ route('absensiharianguru.create') }}" class="btn btn-success" >Buat form absen baru</a>
        </div>
    </div>
</div>
<div class="card mt-2">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>no</th>
                    <th>nama</th>
                    <th>hadir</th>
                    <th>sakit</th>
                    <th>izin</th>
                    <th>tidak ada kabar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($gurunya as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $absennya[$item->id]['hadir'] }}</td>
                    <td>{{ $absennya[$item->id]['sakit'] }}</td>
                    <td>{{ $absennya[$item->id]['izin'] }}</td>
                    <td>{{ $absennya[$item->id]['alfa'] }}</td>
                </tr>
                    
                @empty
                <tr>
                    <td>1</td>
                    <td>Lorem ipsum dolor sit amet consectetur.</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                    
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection