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
                            <div claswebs="clearfix"></div>
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
                                            <td class="text-center">C{{ $item->code }} / {{ $item->bobot }} /
                                                {{ $item->sifat }}</td>
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
                                        <td colspan="2">Nilai Max</td>
                                        @foreach ($kriterias as $item)
                                            <td class="text-center text-score" id="max-{{ $item->id }}"></td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td colspan="2">Nilai Min</td>
                                        @foreach ($kriterias as $item)
                                            <td class="text-center text-score" id="min-{{ $item->id }}"></td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Nilai Normalisasi </h2>
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

                            <div claswebs="clearfix"></div>
                            <table class="table table-striped normalisasi-table" id="nirmalisasi-table">
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
                                            <td class="text-center">C{{ $item->code }} / {{ $item->bobot }} /
                                                {{ $item->sifat }}</td>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lokasis as $item_lk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>A{{ $item_lk->code }} - {{ $item_lk->nama_lokasi }}</td>
                                            @foreach ($kriterias as $item)
                                                <td class="text-center"
                                                    id="normalisasi-{{ $item_lk->id }}_{{ $item->id }}"></td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                  <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Nilai Normalisasi </h2>
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

                            <div claswebs="clearfix"></div>
                            <table class="table table-striped normalisasi-table" id="nirmalisasi-table">
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
                                            <td class="text-center">C{{ $item->code }} / {{ $item->bobot }} /
                                                {{ $item->sifat }}</td>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lokasis as $item_lk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>A{{ $item_lk->code }} - {{ $item_lk->nama_lokasi }}</td>
                                            @foreach ($kriterias as $item)
                                                <td class="text-center"
                                                    id="normalisasi-{{ $item_lk->id }}_{{ $item->id }}"></td>
                                            @endforeach
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
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            get_data();
            get_min_max();
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
        // $(document).on("input", "#nilai-table input", function() {
        //     let cellId = $(this).closest("td").attr("id");
        //     let value = $(this).val();

        //     let parts = cellId.split("_");
        //     let rowId = parts[0];
        //     let colId = parts[1];

        //     let normalisasiCell = $("#normalisasi-" + rowId + "_" + colId);

        //     // Masukkan value yang sama
        //     if (normalisasiCell.length) {
        //         normalisasiCell.text(value);
        //     }
        // });

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
                    kriteria_id: col,
                    lokasi_id: row,
                },
                success: function(res) {
                    Notiflix.Notify.success(res.message);
                    td.removeClass("editing").text(newValue);
                    normalisasiRow();
                },
                error: function(err) {
                    Notiflix.Notify.failure('Gagal simpan');
                    console.error("Gagal simpan", err);
                    td.removeClass("editing").text(newValue); // tetap tampilkan
                }
            });
        }
        get_min_max = () => {
            Notiflix.Block.arrows('.text-score');
            $.ajax({
                type: "GET",
                url: "{{ route('nilai.get-score-mix-max') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "JSON",
                success: function(response) {
                    $.each(response.data, function(indexInArray, valueOfElement) {
                        $("#min-" + valueOfElement.kriteria_id).text(valueOfElement.min);
                        $("#max-" + valueOfElement.kriteria_id).text(valueOfElement.max);
                    });
                    Notiflix.Block.remove('.text-score');
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
                    $.each(response.data.nilais, function(indexInArray, valueOfElement) {
                        $("#" + valueOfElement.lokasi_id + "_" + valueOfElement.kriteria_id).text(
                            valueOfElement.nilai);
                    });
                    
                    normalisasiRow();
                    Notiflix.Block.remove('.nilai-table');
                }
            });
        }

        function normalisasiRow() {
            $("#nilai-table tbody tr").each(function() {
                let sum = 0;
                let row = $(this);

                // ambil semua angka dalam baris ini
                row.find("td[id]").each(function() {
                    let val = parseFloat($(this).text().trim()) || 0;
                    sum += val;
                });

                // bagi setiap angka dengan total sum baris
                row.find("td[id]").each(function() {
                    let cellId = $(this).attr("id"); // contoh: "3_2"
                    let val = parseFloat($(this).text().trim()) || 0;

                    if (sum > 0 && cellId) {
                        let hasil = val / sum;

                        // masukkan ke tabel normalisasi
                        let normalisasiCell = $("#normalisasi-" + cellId);
                        if (normalisasiCell.length) {
                            normalisasiCell.text(hasil.toFixed(4)); // bulatkan 4 desimal
                        }
                    }
                });
            });
        }
        // hitung nilai normalisasi
        hitungTotalRow = () => {
            $("#nilai-table tbody tr").each(function() {
                let total = 0;
                $(this).find("input").each(function() {
                    let val = parseFloat($(this).val()) || 0;
                    total += val;
                });

                let lastCell = $(this).find("td.total-cell");
                if (lastCell.length === 0) {
                    $("#normalisasi-")
                } else {
                    lastCell.text(total);
                }
            });
        }
    </script>
@endsection
