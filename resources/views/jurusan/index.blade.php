@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header d-flex">
        <h5 class="card-title flex-grow-1">
            List Jurusan
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
                        <th>nama jurusan</th>
                        <th>kode jurusan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($jurusan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_jurusan }}</td>
                        <td>{{ $item->kode_jurusan }}</td>
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
                                    <form action="{{ route('jurusan.destroy',['jurusan'=>$item]) }}" method="post">
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
                        <td colspan="4" class="bg-warning text-white text-center">No data</td>
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
        <form class="modal-content" action="{{ route('jurusan.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTitle">Tambah Jurusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                        <input type="text" id="nama_jurusan" class="form-control" name="nama_jurusan"
                            placeholder="masukan nama jurusan" autofocus required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="kode_jurusan" class="form-label">Kode / singkatan jurusan</label>
                        <input type="text" id="kode_jurusan" class="form-control" name="kode_jurusan"
                            placeholder="masukan kode atau singkatan jurusan" required />
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
@forelse ($jurusan as $item)

<div class="modal fade" id="modalUpdate{{ $loop->iteration }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('jurusan.update',['jurusan'=>$item]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateTitle">Update Jurusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                        <input type="text" id="nama_jurusan" class="form-control" name="nama_jurusan"
                            value="{{ $item->nama_jurusan }}" autofocus required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="kode_jurusan" class="form-label">Kode / singkatan jurusan</label>
                        <input type="text" id="kode_jurusan" class="form-control" name="kode_jurusan"
                            value="{{ $item->kode_jurusan }}" required />
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