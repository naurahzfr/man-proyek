@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h5>Selamat Datang Di Website Management Project</h5>
    <div class="row">

        <div class="col-sm-3">
    
            <div class="card">
    
                <div class="card-body rounded bg-primary">
    
                    <h5 class="card-title">Jumlah Project Masuk</h5>
    
                    <p class="card-text fa-2x">5</p>
                    
                    <!-- <i class="bi bi-calendar"></i> -->
                </div>
    
            </div>
    
        </div>
    
        <div class="col-sm-3">
    
            <div class="card">
    
                <div class="card-body rounded bg-warning">
    
                    <h5 class="card-title">Jumlah Project Berjalan</h5>
    
                    <p class="card-text fa-2x">4</p>
    
                </div>
    
            </div>
    
        </div>
    
        <div class="col-sm-3">
    
            <div class="card">
    
                <div class="card-body rounded bg-info">
    
                    <h5 class="card-title">Jumlah Project Pending</h5>
    
                    <p class="card-text fa-2x">3</p>
    
                </div>
    
            </div>
    
        </div>
    
        <div class="col-sm-3">
    
            <div class="card">
    
                <div class="card-body rounded bg-success">
    
                    <h5 class="card-title">Jumlah project Selesai</h5>
    
                    <p class="card-text fa-2x">3</p>
    
                </div>
    
            </div>
    
        </div>
    
        </div>

    {{-- <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Jumlah Project Masuk</p>
                <div class="d-flex flex-warp justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">100</h3>
                    <i class="bi bi-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
                <p class="mb-0 mt-2 text warning">
                    <span class="text-black ml-1">
                        <small>(30 days)</small>
                    </span>
                </p>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                    <div>
                            <h4 class="border-top-0">Data Project</h4>
                            <p class="card-subtitle"></p>
                        </div>
                        <!-- <div class="ms-auto">
                            <div class="dl">
                                <select class="form-select shadow-none">
                                    <option value="0" selected>Monthly</option>
                                    <option value="1">Daily</option>
                                    <option value="2">Weekly</option>
                                    <option value="3">Yearly</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                    <!-- title -->
                    <div class="table-responsive">
                        <table class="table mb-6 table-hover align-middle text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Project</th>
                                    <th class="border-top-0">Client</th>
                                    <th class="border-top-0">Deadline</th>
                                    <th class="border-top-0">Status Project</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Aplikasi Absensi Pegawai</td>
                                    <td>Perfect Solution</td>
                                    <td>01/05/2022</td>
                                    <td>
                                    <label class="badge bg-warning">Berjalan</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Manajemen Keuangan</td>
                                    <td>Taxpro</td>
                                    <td>30/04/2021</td>
                                    <td>
                                        <label class="badge bg-warning">Berjalan</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pengelolaan Produk</td>
                                    <td>Holomoc</td>
                                    <td>07/05/2022</td>
                                    <td>
                                        <label class="badge bg-warning">Berjalan</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dashboard Penjualan</td>
                                    <td>A-Box</td>
                                    <td>28/04/2022</td>
                                    <td>
                                        <label class="badge bg-warning">Berjalan</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Aplikasi LMS</td>
                                    <td>SD AL Madinah</td>
                                    <td>02/08/2022</td>
                                    <td>
                                        <label class="badge bg-warning">Berjalan</label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>    
                    </div>
                </div>
            <!-- </div> -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Meeting Schedule</h2>
                    <div id="calendar"></div>
                </div> 
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
                <div>
                    <h4 class="border-top-0">Dokumen Project</h4>
                    <p class="card-subtitle"></p>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Project</th>
                                <th scope="col">Nama Client</th>
                                <th scope="col">Status Project</th>
                                <th scope="col">Jumlah Dokumen Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Aplikasi Absensi Pegawai</td>
                                <td>Perfect Solution</td>
                                <td><label class="badge bg-warning">Berjalan</label></td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                    <td>Manajemen Keuangan</td>
                                    <td>Taxpro</td>
                                    <td><label class="badge bg-warning">Berjalan</label></td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                    <td>Pengelolaan Produk</td>
                                    <td>Holomoc</td>
                                    <td><label class="badge bg-warning">Berjalan</label></td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                <th scope="row">4</th>
                                    <td>Dashboard Penjualan</td>
                                    <td>A-Box</td>
                                    <td><label class="badge bg-warning">Berjalan</label></td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                <th scope="row">5</th>
                                    <td>Aplikasi LMS</td>
                                    <td>SD AL Madinah</td>
                                    <td><label class="badge bg-warning">Berjalan</label></td>
                                    <td>2</td>
                                </tr>
                            {{-- <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td></td>
                                <td>@twitter</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    <script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendar = $('#calendar').fullCalendar({

            header: {
                left: 'prev,next today',
                center: 'title',
                right: ' '
            },
            events: '/full-calender',
            selectable: true,
            selectHelper: true,
            select: function (start_date, end_date, allDay) {
                let start_dates = $.fullCalendar.formatDate(start_date, 'YYYY-MM-DD');
                let start = start_dates + 'T' + $.fullCalendar.formatDate(start_date, 'HH:mm');
                let end_dates = $.fullCalendar.formatDate(end_date, 'YYYY-MM-DD');
                let end = end_dates + 'T' + $.fullCalendar.formatDate(end_date, 'HH:mm');
                // $.aka

                //     var end_date = $.fullCalendar.formatDate(end_date, 'Y-MM-DD HH:mm:ss');
                // let id = $("#name_user").val();

                $.ajax({
                    success: function (res) {
                        $('#start_date').val(start);
                        $('#end_date').val(end);
                        $('#tambahMeet').modal('toggle');
                        // console.log(start_dates);
                    },
                    error: function (err) {
                        // $("#jabatan").val('');
                    }
                });



            },
            editable: true,

        });

    });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
@stop