@extends('layouts.template')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Data Kriteria</h3>
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
                            <h2>Data Kriteria</h2>
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
                                <strong>Pengisian Data Bobot Kriteria</strong>
                                <ul>
                                    <li>
                                        Bobot kriteria dibuat dengan rentang 0,1 sampai dengan 1 menandakan kriteria yang
                                        paling penting.
                                    </li>
                                    <li> Total bobot kriteria harus 1.
                                    </li>
                                </ul>
                            </div>
                            <button type="button" onclick="add_data()" class="btn btn-sm btn-success"><i
                                    class="fa fa-plus"></i> Tambah Kriteria</button>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Sifat</th>
                                        <th>Bobot</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriterias as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->sifat }}</td>
                                            <td>{{ $item->bobot }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td style="width: 15%">
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
                    <form action="{{ route('kriteria.store') }}" id="form-tambah" enctype="multipart/form-data"
                        method="post">

                        <div class="form-group">
                            <label for="">Kode</label>
                            <input type="text" name="code" id="code" class="form-control"
                                placeholder="Code Kriteria" readonly aria-describedby="helpId">
                            <small id="helpId" class="text-muted text-error e-code">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                placeholder="Nama Kriteria" aria-describedby="helpId">
                            <small id="helpId" class="text-muted text-error e-nama">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="">Sifat</label>
                            <select name="sifat" class="form-control" id="sifat">
                                <option value="">Pilih Sifat</option>
                                <option value="benefit">Benefit</option>
                                <option value="cost">Cost</option>
                            </select>
                            <small id="helpId" class="text-muted text-error e-sifat">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="">Bobot</label>
                            <input type="number" name="bobot" id="bobot" class="form-control"
                                placeholder="Bobot Kriteria" aria-describedby="helpId">
                            <small id="helpId" class="text-muted text-error e-bobot">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi Kriteria"
                                aria-describedby="helpId"></textarea>
                            <small id="helpId" class="text-muted text-error e-deskripsi">Help text</small>
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
                url: "{{ route('kriteria.code') }}",
                dataType: "JSON",
                success: function(response) {
                    $("#form-tambah").resetForm();
                    $('#code').val(response.data);
                    $(".text-error").text('');
                    $('.modal-tambah-title').text('Tambah Data Kriteria');
                    $('#modal-tambah').modal('show');
                    $("#form-tambah").attr('action', "{{ route('kriteria.store') }}");
                    sessionStorage.setItem('action', 'add');
                    sessionStorage.setItem('method', 'POST')
                }
            });
        }
        store_data = () => {
            $(".text-error").text(''); // reset error
            let data = {
                nama: $('#nama').val(),
                sifat: $('#sifat').children("option:selected").val(),
                bobot: $('#bobot').val(),
                code: $('#code').val(),
                deskripsi: $('#deskripsi').val(),
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
            $("#form-tambah").attr('action', "{{ url('kriteria') }}" + "/" + id);
            $.ajax({
                type: "GET",
                url: "/kriteria/" + id + "/edit",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "JSON",
                success: function(response) {
                    $('#nama').val(response.nama);
                    $('#sifat').val(response.sifat);
                    $('#bobot').val(response.bobot);
                    $('#deskripsi').val(response.deskripsi);
                    $("#code").val(response.code);
                    $('.modal-tambah-title').text('Edit Data Kriteria');
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
                        url: "/kriteria/" + id,
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
