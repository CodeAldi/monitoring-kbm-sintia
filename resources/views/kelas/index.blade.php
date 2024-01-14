@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header d-flex">
        <h5 class="card-title flex-grow-1">
            List kelas
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
                        <th>kode kelas</th>
                        <th>nama Kelas</th>
                        <th>tingkat kelas</th>
                        <th>jurusan kelas</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($kelas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_kelas }}</td>
                        <td>{{ $item->nama_kelas }}</td>
                        <td>{{ $item->tingkat_kelas }}</td>
                        <td>{{ $item->jurusan->kode_jurusan }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#modalUpdate{{ $loop->iteration }}"
                                        data-bs-toggle="modal"><i class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <form action="{{ route('kelas.destroy',['kelas'=>$item]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-trash me-1"></i>
                                            Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="bg-warning text-white text-center">No data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
<!-- Modal untuk create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('kelas.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTitle">Tambah kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="tingkat_kelas" class="form-label">Tingkat kelas</label>
                        <select name="tingkat_kelas" id="tingkat_kelas" class="form-select">
                            <option>-- select --</option>
                            <option value="10">X / 10</option>
                            <option value="11">XII / 11</option>
                            <option value="12">X / 12</option>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="jurusan_kelas" class="form-label">Jurusan kelas</label>
                        <select name="jurusan_id" id="tingkat_kelas" class="form-select">
                            <option>--select</option>
                            @forelse ($jurusan as $item)
                            <option value="{{ $item->id }}">{{ $item->kode_jurusan }}</option>
                            @empty
                            <option class="bg-warning text-white text-center">No Data</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama_kelas" class="form-label">Nama kelas</label>
                        <input type="text" id="nama_kelas" class="form-control" name="nama_kelas"
                            placeholder="masukan nama kelas" autofocus required />
                    </div>
                    <div class="col mb-2">
                        <label for="kode_kelas" class="form-label">kode kelas</label>
                        <input type="text" id="kode_kelas" class="form-control" name="kode_kelas"
                            placeholder="masukan kode kelas" autofocus required />
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
<!-- Modal untuk update -->
@forelse ($kelas as $item)

<div class="modal fade" id="modalUpdate{{ $loop->iteration }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('kelas.update',['kelas'=>$item]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateTitle">Update kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="tingkat_kelas" class="form-label">Tingkat kelas</label>
                        <select name="tingkat_kelas" id="tingkat_kelas" class="form-select">
                            <option>-- select --</option>
                            <option value="10" @if ('10'==$item->tingkat_kelas)
                                selected
                                @endif>X / 10</option>
                            <option value="11"@if ('11' == $item->tingkat_kelas)
                                selected
                            @endif>XII / 11</option>
                            <option value="12"@if ('12' == $item->tingkat_kelas)
                                selected
                            @endif>X / 12</option>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="jurusan_kelas" class="form-label">Jurusan kelas</label>
                        <select name="jurusan_id" id="tingkat_kelas" class="form-select">
                            <option>--select</option>
                            @forelse ($jurusan as $itemjurusan)
                            <option value="{{ $itemjurusan->id }}" @if ($itemjurusan->id == $item->jurusan_id)
                            selected
                            @endif>{{ $itemjurusan->kode_jurusan }}</option>
                            @empty
                            <option class="bg-warning text-white text-center">No Data</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama_kelas" class="form-label">Nama kelas</label>
                        <input type="text" id="nama_kelas" class="form-control" name="nama_kelas"
                            value="{{ $item->nama_kelas }}" autofocus required />
                    </div>
                    <div class="col mb-2">
                        <label for="kode_kelas" class="form-label">kode kelas</label>
                        <input type="text" id="kode_kelas" class="form-control" name="kode_kelas"
                            value="{{ $item->kode_kelas }}" autofocus required />
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
@empty

@endforelse