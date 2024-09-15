@extends('layouts.dashboard')
@section('content')
@if ($errors->any())

<div class="alert alert-danger alert-dismissible " role="alert">
    
    @if ($errors->kode_mapel)
        mapel / kode mapel sudah ada
    @endif
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
    <div class="card-header d-flex">
        <h5 class="card-title flex-grow-1">
            List Mata Pelajaran
        </h5>
        <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modalupload"><i
                class='bx bx-spreadsheet'></i> Tambah melalui file excel</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">Tambah
            Manual</button>
    </div>
    <div class="card-body">
        <div class="text-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>nama mapel</th>
                        <th>kode mapel</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($mapel as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-capitalize">{{ $item->nama_mapel }}</td>
                        <td class="text-uppercase">{{ $item->kode_mapel }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#modalUpdate{{ $loop->iteration }}" data-bs-toggle="modal"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <form action="{{ route('mapel.destroy',['mapel'=>$item]) }}" method="post">
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
        <form class="modal-content" action="{{ route('mapel.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTitle">Tambah Mata Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
                        <input type="text" id="nama_mapel" class="form-control text-capitalize" name="nama_mapel"
                            placeholder="masukan nama mapel" autofocus required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="kode_mapel" class="form-label">Kode / singkatan Mapel</label>
                        <input type="text" id="kode_mapel" class="form-control text-uppercase" name="kode_mapel"
                            placeholder="masukan kode atau singkatan mapel" required />
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
@forelse ($mapel as $item)
    
<div class="modal fade" id="modalUpdate{{ $loop->iteration }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('mapel.update',['mapel'=>$item]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateTitle">Update Mata Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
                        <input type="text" id="nama_mapel" class="form-control" name="nama_mapel"
                            value="{{ $item->nama_mapel }}" autofocus required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="kode_mapel" class="form-label">Kode / singkatan Mapel</label>
                        <input type="text" id="kode_mapel" class="form-control" name="kode_mapel"
                            value="{{ $item->kode_mapel }}" required />
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

{{-- modal upload exce --}}
<div class="modal fade" id="modalUpload" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title text-capitaliza" id="modalUploadTitle">Upload file excel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col">
                        <label for="excel" class="form-label">file excel</label>
                        <input type="file" id="excel" name="siswaExcel" class="form-control"
                            placeholder="upload file excel" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><i class='bx bx-info-circle'></i>Wajib menggunakan template, download file template <a
                                href="{{ route('mapel.template') }}" class="btn-sm btn-info">Disini</a> </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>
</div>