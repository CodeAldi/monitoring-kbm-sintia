@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header d-flex">
        <h5 class="card-title flex-grow-1">
            List Pembagian Tugas Mengajar Guru
        </h5>
        <button type="button" class="btn btn-success" data-bs-toggle="modal"
            data-bs-target="#modalCreate">Tambah</button>
    </div>
    <div class="card-body">
        <div class="text-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>nama Guru</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Nama Kelas</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($guruMapel as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->mapel->nama_mapel }}</td>
                        <td>{{ $item->kelas->nama_kelas }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#modalUpdate{{ $loop->iteration }}" data-bs-toggle="modal"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <form action="{{ route('gurumapel.destroy',['guruMapel'=>$item]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                            Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="bg-warning text-white text-center">No data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal untuk create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('gurumapel.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTitle">Pembagian Tugas Mengajar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="user_id" class="form-label">Nama Guru</label>
                        <select name="users_id" id="users_id" class="form-select">
                            <option value="#">Pilih Guru</option>
                            @forelse ($guru as $item)
                            <option value="{{ $item->id }}">{{ $item->nomor_induk }} - {{ $item->name }}</option>
                            @empty
                            <option class="text-white bg-warning">No Data</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="mapel_id" class="form-label">Kode / Nama Mapel</label>
                        <select name="mapel_id" id="mapel_id" class="form-select">
                            <option value="#">Pilih Mapel</option>
                            @forelse ($mapel as $item)
                            <option value="{{ $item->id }}">{{ $item->kode_mapel }} - {{ $item->nama_mapel }}</option>
                            @empty
                            <option class="text-white bg-warning">No Data</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="kelas_id" class="form-label">Kode / Nama kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-select">
                            <option value="#">Pilih Kelas</option>
                            @forelse ($kelas as $item)
                            <option value="{{ $item->id }}">{{ $item->kode_kelas }} - {{ $item->nama_kelas }}</option>
                            @empty
                            <option class="text-white bg-warning">No Data</option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>
{{-- End Modal untuk create --}}
@foreach ($guruMapel as $item)
<!-- Modal untuk Update -->
<div class="modal fade" id="modalUpdate{{ $loop->iteration }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('gurumapel.update',['guruMapel'=>$item]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateTitle">Pembagian Tugas Mengajar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="user_id" class="form-label">Nama Guru</label>
                        <select name="users_id" id="users_id" class="form-select">
                            <option value="#">Pilih Guru</option>
                            @forelse ($guru as $itemguru)
                            <option value="{{ $itemguru->id }}" @if($itemguru->id == $item->user->id) selected @endif>{{ $itemguru->nomor_induk }} - {{ $itemguru->name }}</option>
                            @empty
                            <option class="text-white bg-warning">No Data</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="mapel_id" class="form-label">Kode / Nama Mapel</label>
                        <select name="mapel_id" id="mapel_id" class="form-select">
                            <option value="#">Pilih Mapel</option>
                            @forelse ($mapel as $itemmapel)
                            <option value="{{ $itemmapel->id }}" @if($itemmapel->id == $item->mapel->id) selected @endif>{{ $itemmapel->kode_mapel }} - {{ $itemmapel->nama_mapel }}</option>
                            @empty
                            <option class="text-white bg-warning">No Data</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="kelas_id" class="form-label">Kode / Nama kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-select">
                            <option value="#">Pilih Kelas</option>
                            @forelse ($kelas as $itemkelas)
                            <option value="{{ $itemkelas->id }}" @if($itemkelas->id == $item->kelas->id) selected @endif>{{ $itemkelas->kode_kelas }} - {{ $itemkelas->nama_kelas }}</option>
                            @empty
                            <option class="text-white bg-warning">No Data</option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>
{{-- End Modal untuk Update --}}
@endforeach
@endsection