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
        <a href="#" class="btn btn-success d-block">Tambah</a>

    </div>
    <div class="col-6">
        <a href="#" class="btn btn-danger d-block">Hapus</a>

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
@endsection