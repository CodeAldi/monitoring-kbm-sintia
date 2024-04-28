@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h2 class="text-center">Rencana Pelaksanaan pembelajaran</h2>
            <h3>Mata Pelajaran : <strong>{{ $data[0]->mapel->nama_mapel }}</strong></h3>
            <h3>Kelas : <strong>{{ $data[0]->kelas->tingkat_kelas }}</strong></h3>
        </div>

    </div>
</div>
<div class="row mt-4">
    <div class="col-6">
        <a class="btn btn-success d-block" data-bs-toggle="modal" href="#modalTambah">Tambah Pertemuan</a>

    </div>
    <div class="col-6">
        <a class="btn btn-danger d-block" data-bs-toggle="modal" href="#modalHapus">Hapus Pertemuan</a>

    </div>
</div>
<div class="nav-align-top mt-4">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#pertemuan-1"
                aria-controls="pertemuan-1" aria-selected="true">
                pertemuan-1
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#pertemuan-2"
                aria-controls="pertemuan-2" aria-selected="false">
                pertemuan-2
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#pertemuan-3"
                aria-controls="pertemuan-3" aria-selected="false">
                pertemuan-3
            </button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pertemuan-1" role="tabpanel">
            <p>kompetensi Dasar :
            <ul class="list-unstyled">
                <li>3.10 Mengevaluasi Control Panel Hosting</li>
                <li>4.10 Mengkonfigurasi Control Panel Hosting</li>
            </ul>
            </p>
            <h5>
                A.Tujuan Pembelajaran
            </h5>
            <p>
                Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon
                jelly-o jelly-o ice cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow
                jujubes sweet.
            </p>
            <h5>
                B.Langkah-langkah Pembelajaran
            </h5>
            <p>
                Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon
                jelly-o jelly-o ice cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow
                jujubes sweet.
            </p>
            <h5>
                C.Assesmen
            </h5>
            <p class="mb-0">
                Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon
                jelly-o jelly-o ice cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow
                jujubes sweet.
            </p>
        </div>
        <div class="tab-pane fade" id="pertemuan-2" role="tabpanel">
            <p>
                Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice
                cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream
                cheesecake fruitcake.
            </p>
            <p class="mb-0">
                Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah
                cotton candy liquorice caramels.
            </p>
        </div>
        <div class="tab-pane fade" id="pertemuan-3" role="tabpanel">
            <p>
                Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
                cupcake gummi bears cake chocolate.
            </p>
            <p class="mb-0">
                Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet
                roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
                jelly-o tart brownie jelly.
            </p>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Tambah Pertemuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">kompetensi Dasar</label>
                        <textarea id="nameWithTitle" class="form-control"
                            placeholder="3.10 judul kd pertama&#10;4.10 judul Kd kedua dan seterusnya"></textarea>
                    </div>
                </div>
                <div class="col mb-3">
                    <label for="emailWithTitle" class="form-label">Tujuan Pembelajaran</label>
                    <textarea id="emailWithTitle" class="form-control"
                        placeholder="isikan tujuan pembelajaran"></textarea>
                </div>
                <div class="col mb-3">
                    <label for="dobWithTitle" class="form-label">Langkah Langlah Pembelajaran</label>
                    <textarea id="dobWithTitle" class="form-control mb-2"
                        placeholder="[PENDAHULUAN]"></textarea>
                    <textarea id="dobWithTitle" class="form-control mb-2"
                        placeholder="[INTI]"></textarea>
                    <textarea id="dobWithTitle" class="form-control "
                        placeholder="[PENUTUP]"></textarea>
                </div>
                <div class="col mb-3">
                    <label for="dobWithTitle" class="form-label">Assesmen</label>
                    <textarea id="dobWithTitle" class="form-control" placeholder="assessmen"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">Name</label>
                        <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name" />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailWithTitle" class="form-label">Email</label>
                        <input type="text" id="emailWithTitle" class="form-control" placeholder="xxxx@xxx.xx" />
                    </div>
                    <div class="col mb-0">
                        <label for="dobWithTitle" class="form-label">DOB</label>
                        <input type="text" id="dobWithTitle" class="form-control" placeholder="DD / MM / YY" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection