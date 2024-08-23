@extends('layouts.dashboard')
@section('content')

@if ($errors->any())
    
<div class="alert alert-danger alert-dismissible " role="alert">
    @if ($errors->nama)
        <p>nama tidak boleh kosong</p>
    @elseif ($errors->nis)
        <p>nis sudah ada</p>
    @elseif ($errors->jenis_kelamin)
        <p>jenis kelamin tidak boleh kosong</p>
    @endif
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif (session()->has('success'))
    <div class="alert alert-success alert-dismissible " role="alert">
        <h5>data siswa berhasil ditambahkan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="card">
        <div class="card-body">
            <div class="card-header d-flex">
                <h5 class="card-title flex-grow-1">
                    List Data Siswa
                </h5>
                <button type="button" class="btn btn-success me-2" data-bs-toggle="modal"
                    data-bs-target="#modalupload"><i class='bx bx-spreadsheet'></i> Tambah melalui file excel</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalCreate">Tambah Manual</button>
            </div>
            <div class="text-wrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>nis</th>
                            <th>nama</th>
                            <th>jenis kelamin</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>
                                <button class="btn btn-warning" disabled><i class='bx bx-edit'></i> Edit</button>
                                <button class="btn btn-danger" disabled><i class='bx bx-trash'></i> Hapus</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center bg-warning text-white">Data Kosong</td>
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
        <form class="modal-content" action="{{ route('siswa.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTitle">Tambah Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" class="form-control" name="nama" placeholder="masukan nama siswa"
                            autofocus required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="number" id="nis" class="form-control" name="nis"
                            placeholder="masukan nomor induk siswa" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="jenkel" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                            <option value="0" hidden> pilih jenis kelamin</option>
                            <option value="laki laki">laki laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal untuk update -->
{{-- modal untuk delete --}}
{{-- modal untuk upload excel --}}
<div class="modal fade" id="modalUpload" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUploadTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBackdrop" class="form-label">Name</label>
                        <input type="text" id="nameBackdrop" class="form-control" placeholder="Enter Name" />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailBackdrop" class="form-label">Email</label>
                        <input type="text" id="emailBackdrop" class="form-control" placeholder="xxxx@xxx.xx" />
                    </div>
                    <div class="col mb-0">
                        <label for="dobBackdrop" class="form-label">DOB</label>
                        <input type="text" id="dobBackdrop" class="form-control" placeholder="DD / MM / YY" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>