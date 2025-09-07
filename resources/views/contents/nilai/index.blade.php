@extends('layouts.template')
@section('content')
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
            cursor: pointer;
        }

        tr.selected {
            background-color: #d1f7d1;
            /* warna highlight */
        }

        input.cell-input {
            width: 100%;
            border: none;
            background: #ffffcc;
            padding: 4px;
        }
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Matrix Kriteria dan Altertanif</h3>
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
                            <h2>Matrix Kriteria dan Altertanif</h2>
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
                                <strong>Pengisian</strong>
                                <ul>
                                    <li>Data dapat di isi dengan klik tabel pada aplikasi
                                    </li>
                                    <li> Ketika Data di ubah akan otomatis update ke database
                                    </li>
                                </ul>
                            </div>
                            <button class="btn btn-success btn-sm"> Proses Data</button>
                            <div class="clearfix"></div>
                            <table class="table table-striped nilai-table" id="nilai-table">
                                <thead>
                                    <tr>
                                        <td rowspan="2">No</td>
                                        <td rowspan="2">Altertanif</td>
                                        @foreach ($kriterias as $item)
                                            <td class="text-center">{{ $item->nama }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach ($kriterias as $item)
                                            <td class="text-center">C{{ $item->code }}</td>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lokasis as $item_lk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>A{{ $item_lk->code }} - {{ $item_lk->nama_lokasi }}</td>
                                            @foreach ($kriterias as $item)
                                                <td class="text-center" id="{{ $item_lk->id }}_{{ $item->id }}"></td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>Nilai Max</td>
                                    </tr>
                                    <tr>
                                        <td>Nilai Min</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            get_data();
            $("#nilai-table").on("click", "td", function() {
                let colIndex = $(this).index();
                if (colIndex <= 1) return;

                if (!$(this).hasClass("editing")) {
                    let currentText = $(this).text().trim();
                    $(this).addClass("editing");
                    $(this).html(`<input type="text" class="cell-input" value="${currentText}" />`);
                    $(this).find("input").focus();
                }
            });

            // Saat keluar dari input
            $("#nilai-table").on("blur", ".cell-input", function() {
                let newText = $(this).val();
                let td = $(this).closest("td");
                saveCell(td, newText);
            });

            // Tekan Enter langsung simpan
            $("#nilai-table").on("keypress", ".cell-input", function(e) {
                if (e.which == 13) {
                    $(this).blur();
                }
            });
        });

        function saveCell(td, newValue) {
            let cellId = td.attr("id"); 
            let parts = cellId.split("_");
            let row = parts[0];
            let col = parts[1];
            $.ajax({
                url: "{{ route('nilai.update-data') }}",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: cellId,
                    nilai: newValue,
                    kriteria_id: row,
                    lokasi_id: col,
                },
                success: function(res) {
                    Notiflix.Notify.success(res.message);
                    td.removeClass("editing").text(newValue);
                },
                error: function(err) {
                    Notiflix.Notify.failure('Gagal simpan');
                    console.error("Gagal simpan", err);
                    td.removeClass("editing").text(newValue); // tetap tampilkan
                }
            });
        }
        get_data = () => {
            Notiflix.Block.standard('.nilai-table', 'Please wait...');
            $.ajax({
                type: "GET",
                url: "{{ route('nilai.get-data') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data.nilais, function (indexInArray, valueOfElement) { 
                         $("#"+valueOfElement.lokasi_id+"_"+valueOfElement.kriteria_id).text(valueOfElement.nilai);
                    });
                    Notiflix.Block.remove('.nilai-table');
                }
            });
        }
        add_data = () => {
            $.ajax({
                type: "GET",
                url: "{{ route('kriteria.code') }}",
                dataType: "JSON",
                success: function(response) {
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
