@extends('layouts.dashboard')
@section('content')
<div class="card mb-2">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="card-text">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Diisi oleh Rombel</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataKelas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kelas }}</td>
                            <td>
                                @forelse ($dataKelasdanRombel as $itemrombelkelas)
                                    @if ($itemrombelkelas->kelas_id == $item->id)
                                        {{ $itemrombelkelas->rombel->nama_group_rombongan_belajar }}
                                    @else
                                    <span class="text-secondary">Belum diisi oleh rombel manapun</span>
                                        
                                    @endif
                                @empty
                                <span class="text-secondary">Belum diisi oleh rombel manapun</span>
                                @endforelse
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                
                                        <a class="dropdown-item" href="#modalCreate{{ $loop->iteration }}" data-bs-toggle="modal"><i
                                                class="bx bx-list-plus me-1"></i>
                                            Tambah rombel untuk kelas ini</a>
                                        {{-- <a class="dropdown-item" href="#modalUpdate{{ $loop->iteration }}" data-bs-toggle="modal"><i
                                                class="bx bx-trash me-1"></i>
                                            Hapus rombel untuk kelas ini</a> --}}
                                        {{-- <form action="#" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                                hapus group</button>
                                        </form> --}}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-white bg-warning">Data Masih Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@forelse ($dataKelas as $itemkelas)
    
<div class="modal fade" id="modalCreate{{ $loop->iteration }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('pembagianRombelKelas.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTitle">Penunjukan Rombel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="rombel" class="form-label">Nama Rombel / group siswa</label>
                        <select name="rombel" id="rombel" class="form-select">
                            <option value="">Pilih Rombel</option>
                            @forelse ($rombel as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_group_rombongan_belajar }}</option>
                            @empty
                                <option value="" disabled>Data Rombel Masih Kosong / tidak ditemukan</option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
            <input type="text" class="form-control" name="kelas" value="{{ $itemkelas->id }}" readonly hidden/>
            
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
<div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="#" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTitle">Penunjukan Rombel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="rombel" class="form-label">Nama Rombel / group siswa</label>
                        <select name="rombel" id="rombel" class="form-select">
                            <option value="">Pilih Rombel</option>
                            @forelse ($rombel as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_group_rombongan_belajar }}</option>
                            @empty
                                <option value="" disabled>Data Rombel Masih Kosong / tidak ditemukan</option>
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
@endforelse
@endsection