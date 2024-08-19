@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('absensiswa.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <h5 class="card-title">{{ $title }}</h5>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary"><i class='menu-icon bx bx-save'></i> Simpan</button>
                </div>
            </div>
            <table class="table mt-1">
                <thead>
                    <th>no</th>
                    <th>nama</th>
                    <th>Hadir</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Alfa</th>
                </thead>
                <tbody>
                    
                    @forelse ($siswa as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->siswa->nama }}</td>
                        @forelse ($dataabsen as $itemabsen)
                            @if ($itemabsen->users_id == $item->siswa->id)
                                <td>
                                    <input name="{{ $item->siswa->id }}" class="form-check-input" type="radio" value="hadir" @if ($itemabsen->status == 'hadir')
                                        @checked(true)
                                    @endif />
                                </td>
                                <td>
                                    <input name="{{ $item->siswa->id }}" class="form-check-input" type="radio" value="sakit" @if ($itemabsen->status == 'sakit')
                                    @checked(true)
                                    @endif />
                                </td>
                                <td>
                                    <input name="{{ $item->siswa->id }}" class="form-check-input" type="radio" value="izin" @if ($itemabsen->status == 'izin')
                                    @checked(true)
                                    @endif />
                                </td>
                                <td>
                                    <input name="{{ $item->siswa->id }}" class="form-check-input" type="radio" value="alfa" @if ($itemabsen->status == 'alfa')
                                    @checked(true)
                                    @endif />
                                </td>
                            @endif
                        @empty
                        <td>
                            <input name="{{ $item->siswa->id }}" class="form-check-input" type="radio"
                                value="hadir"  />
                        </td>
                        <td>
                            <input name="{{ $item->siswa->id }}" class="form-check-input" type="radio"
                                value="sakit" />
                        </td>
                        <td>
                            <input name="{{ $item->siswa->id }}" class="form-check-input" type="radio"
                                value="izin" />
                        </td>
                        <td>
                            <input name="{{ $item->siswa->id }}" class="form-check-input" type="radio"
                                value="alfa" />
                        </td>
                            
                        @endforelse
                    </tr>
                    <input type="text" value="{{ $gurumapel[0]->id }}" readonly hidden name="gurumapelid">
                    @empty

                    @endforelse
                </tbody>
            </table>
        </form>
    </div>
</div>
@endsection