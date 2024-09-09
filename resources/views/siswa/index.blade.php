@extends('layouts.dashboard')
@section('content')
@push('page-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    
@endpush

@if ($errors->any())
    
<div class="alert alert-danger alert-dismissible " role="alert">
    @foreach ($errors as $error)
        <p>{{ $error }}</p>
    @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif (session()->has('success'))
    <div class="alert alert-success alert-dismissible " role="alert">
        <h5>{{ session('success') }}</h5>
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
                <table class="table" id="tableSiswa">
                    <thead>
                        <tr>
                            <th>nis</th>
                            <th>nama</th>
                            <th>jenis kelamin</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $item)
                        <tr>
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
    <script>
        let table = new DataTable('#tableSiswa', {
            
        });
    </script>
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
                        <input type="file" id="excel" name="siswaExcel" class="form-control" placeholder="upload file excel" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><i class='bx bx-info-circle'></i>Wajib menggunakan template, download file template <a href="{{ route('siswa.template') }}" class="btn-sm btn-info">Disini</a> </p>
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