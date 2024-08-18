@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-header d-flex">
            <h5 class="card-title flex-grow-1">
                List Data Rombel
            </h5>
            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#modalCreate">Tambah</button>
        </div>
        <div class="text-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>nama / kode group rombongan belajar</th>
                        <th>jumlah siswa</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rombel as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_group_rombongan_belajar }}</td>
                        <td>{{ $datasiswa[$item->id] }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    
                                    <a class="dropdown-item" href="{{ route('pembagian-rombel.create',['rombel'=>$item]) }}"><i class="bx bx-list-plus me-1"></i>
                                        Tambahkan siswa ke dalam rombel</a>
                                    <a class="dropdown-item" href="#modalUpdate{{ $loop->iteration }}"
                                        data-bs-toggle="modal"><i class="bx bx-edit-alt me-1"></i>
                                        Edit nama group</a>
                                    <form action="#" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-trash me-1"></i>
                                            hapus group</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center bg-warning text-white">Data Kosong</td>
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
        <form class="modal-content" action="{{ route('rombel.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTitle">Tambah Rombel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Nama / kode rombel</label>
                        <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama / kode rombel"
                            autofocus required />
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
@endsection