@extends('layouts.dashboard')

@section('title', 'Home')

@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Kegiatan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Kegiatan</li>
            </ol>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-block btn-primary mb-3 d-sm-none">Tambah</button>
            <div class="d-block d-sm-flex">
                <input class="form-control mr-3" type="text" placeholder="Cari">
                <button type="button" class="btn btn-primary d-none d-sm-block px-5">Tambah</button>
            </div>
        </div>

    </div>
    <div class="card">
        <div class="card-body">

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Tempat</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex flex-column justify-content-start d-md-block">
                                    <a href="/" class="btn btn-primary mb-1 mb-md-0">Edit</a>
                                    <a href="/" class="btn btn-danger mb-1 mb-md-0">Hapus</a>
                                    <a href="/" class="btn btn-warning">Presensi</a>
                                </div>
                            </td>
                            <td class="align-middle">183</td>
                            <td class="align-middle">John Doe</td>
                            <td class="align-middle">11-7-2014</td>
                            <td class="align-middle"><span class="tag tag-success">Approved</span></td>
                            <td class="align-middle">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.
                            </td>


                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
