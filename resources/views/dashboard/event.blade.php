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
            <button type="button" class="btn btn-block btn-primary mb-3 d-sm-none" data-toggle="modal"
                data-target="#modal-default">Tambah</button>
            <div class="d-block d-sm-flex">
                <input class="form-control mr-3" type="text" placeholder="Cari">
                <button type="button" class="btn btn-primary d-none d-sm-block px-5" data-toggle="modal"
                    data-target="#modal-default">Tambah</button>
            </div>
        </div>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <form action="/events" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Kegiatan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Masukan Nama">
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="text" class="form-control datetimepicker-input" name="date"
                                    data-target="#reservationdate" id="reservationdate" data-toggle="datetimepicker"
                                    placeholder="Masukan Tanggal" />
                            </div>
                            <div class="form-group">
                                <label for="place">Tempat</label>
                                <input type="text" class="form-control" id="place" name="place"
                                    placeholder="Masukan Tempat">
                            </div>

                            <div class="form-group">
                                <label for="place">Catatan</label>
                                <textarea class="form-control" rows="3" id="place" name="note" placeholder="Masukan Catatan"></textarea>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_active">
                                <label class="form-check-label" for="exampleCheck1">Aktifkan Kegiatan</label>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary toastrDefaultSuccess">Simpan</button>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th id="th-action">Action</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Tempat</th>
                            <th>Catatan</th>
                            <th>Aktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $key => $e)
                            <tr>
                                <td class="align-middle">{{ $key + 1 }}</td>
                                <td id="action" class="d-flex flex-column justify-content-start d-md-block">
                                    <a href="/" class="btn btn-primary mb-1 mb-md-0">Edit</a>
                                    <a href="/events/{{ 10 }}" class="btn btn-danger mb-1 mb-md-0">Hapus</a>
                                    <a href="/" class="btn btn-warning">Presensi</a>
                                </td>
                                <td class="align-middle">{{ $e->name }}</td>
                                <td class="align-middle">{{ $e->date }}</td>
                                <td class="align-middle">{{ $e->place }}</td>
                                <td class="align-middle">{{ $e->note }}</td>
                                <td class="align-middle">{{ $e->is_active ? 'Ya' : 'Tidak' }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </div>
@section('js')
    @parent
    <script>
        $(function() {
            @if (session('alert'))
                toastr.success('{{ session('alert') }}');
            @endif


            @if (session('alert-error'))
                toastr.error('{{ session('alert-error') }}');
            @endif


            $('#reservationdate').datetimepicker({
                format: 'L',
                locale: 'id'

            });

            function resize(el) {
                if ($(el).width() <= 576) {
                    $("#th-action").css("width", "120px");
                    $("#action").css("width", "120px");
                } else {
                    $("#th-action").css("width", "235px");
                    $("#action").css("width", "235px");
                }
            }
            resize(window);
            $(window).on("resize", function(event) {
                resize(this);
            })


        })
    </script>
@endsection


@endsection
