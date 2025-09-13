@extends('layouts.template')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Data Lokasi</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data Lokasi</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="alert alert-warning" role="alert">
                                <strong>Pengisian Data Lokasi</strong>
                                <ul>
                                    <li> Data lokasi yang di isi adalah data lokasi yang di bawah binaan</li>
                                </ul>
                            </div>
                            <button type="button" onclick="add_data()" class="btn btn-sm btn-success"><i
                                    class="fa fa-plus"></i> Tambah Lokasi</button>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Lokasi</th>
                                        <th>Nama Penyuluh</th>
                                        <th>Nomor Hp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lokasis as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->nama_lokasi }}</td>
                                            <td>{{ $item->nama_penyuluh }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td style="width: 20%">
                                                <button class="btn btn-sm btn-warning" type="button"
                                                    onclick="edit_data({{ $item->id }})"><i class="fa fa-pencil"></i>
                                                    Edit</button>
                                                <button class="btn btn-sm btn-danger" type="button"
                                                    onclick="delete_data({{ $item->id }})"><i class="fa fa-trash"></i>
                                                    Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title modal-tambah-title">Modal title</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lokasi.store') }}" id="form-tambah" enctype="multipart/form-data"
                        method="post">

                        <div class="form-group">
                            <label for="">Kode</label>
                            <input type="text" name="code" id="code" class="form-control"
                                placeholder="Code Lokasi" readonly aria-describedby="helpId">
                            <small id="helpId" class="text-muted text-error e-code">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lokasi</label>
                            <input type="text" name="nama_lokasi" id="nama_lokasi" class="form-control"
                                placeholder="Nama Lokasi" aria-describedby="helpId">
                            <small id="helpId" class="text-muted text-error e-nama_lokasi">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Penyuluh</label>
                            <input type="text" name="nama_penyuluh" id="nama_penyuluh" class="form-control"
                                placeholder="Nama Penyuluh" aria-describedby="helpId">
                            <small id="helpId" class="text-muted text-error e-nama_penyuluh">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Hp</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control"
                                placeholder="Nomor Hp" aria-describedby="helpId">
                            <small id="helpId" class="text-muted text-error e-no_hp">Help text</small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="store_data()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        add_data = () => {
            $.ajax({
                type: "GET",
                url: "{{ route('lokasi.code') }}",
                dataType: "JSON",
                success: function(response) {
                    $('#code').val(response.data);
                    $(".text-error").text('');
                    $('.modal-tambah-title').text('Tambah Data Lokasi');
                    $('#modal-tambah').modal('show');
                    $("#form-tambah").attr('action', "{{ route('lokasi.store') }}");
                    sessionStorage.setItem('action', 'add');
                    sessionStorage.setItem('method', 'POST')
                }
            });
        }
        store_data = () => {
            $(".text-error").text(''); // reset error
            let data = {
                nama_lokasi: $('#nama_lokasi').val(),
                nama_penyuluh: $('#nama_penyuluh').val(),
                no_hp: $('#no_hp').val(),
                code: $('#code').val(),
            }
            $.ajax({
                type: sessionStorage.getItem('method'),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $("#form-tambah").attr('action'),
                data: data,
                dataType: "JSON",
                success: function(response) {
                    if (response.status) {
                        notif_success(response.message);
                        $('#modal-tambah').modal('hide');
                        location.reload();
                    } else {
                        $.each(response.errors, function(i, v) {
                            console.log(i);
                            $(".e-" + i).text(v[0]);
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                    $(".text-error").text(''); // reset error
                    if (xhr.status === 422) {
                        let res = xhr.responseJSON;
                        $.each(res.errors, function(i, v) {
                            $(".e-" + i).text(v[0]);
                        });
                    } else {
                        console.log("Error " + xhr.status + ": " + thrownError);
                    }
                }
            });
        }
        edit_data = (id) => {
            $(".text-error").text('');
            $("#form-tambah").attr('action', "{{ url('lokasi') }}" + "/" + id);
            $.ajax({
                type: "GET",
                url: "/lokasi/" + id + "/edit",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "JSON",
                success: function(response) {
                    $('#nama_lokasi').val(response.nama_lokasi);
                    $('#nama_penyuluh').val(response.nama_penyuluh);
                    $('#no_hp').val(response.no_hp);
                    $("#code").val(response.code);
                    $('.modal-tambah-title').text('Edit Data Lokasi');
                    $('#modal-tambah').modal('show');
                    // simpan id ke sessionStorage untuk update nanti
                    sessionStorage.setItem('action', 'edit');
                    sessionStorage.setItem('edit_id', id);
                    sessionStorage.setItem('method', 'PUT')
                },
                error: function(xhr) {
                    console.log("Error load data:", xhr.responseText);
                }
            });
        }
        delete_data = (id) => {
            Notiflix.Confirm.show(
                'Konfirmasi',
                'Kamu yakin ingin menghapus data ini?',
                'Ya',
                'Tidak',
                function okCb() {
                    $.ajax({
                        type: "DELETE",
                        url: "/lokasi/" + id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: "JSON",
                        success: function(response) {
                            if (response.status) {
                                notif_success(response.message);
                                location.reload();
                            } else {
                                notif_error(response.message);
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            console.log(xhr.status);
                            console.log(thrownError);
                            notif_error("Error " + xhr.status + ": " + thrownError);
                        }
                    });

                },
                function cancelCb() {
                    alert('If you say so...');
                }, {},
            );
        }
    </script>
@endsection
