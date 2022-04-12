@extends('adminlte::page')

@section('title', 'Penomoran Dokumen')

@section('content_header')
<h1> Management Penomoran Dokumen</h1>
@stop

@section('content')
@if (session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif

<!-- Button trigger modal -->
<div class="card card-default">
    <div class="card-header">
        <form class="form-inline">
            <div class="form-group mr-1">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                    <i class="fas fa-plus"></i>
                    Tambah
                </button>
            </div>
        </form>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped table-hover mb-0" id="example2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Penomoran</th>
                    <th>Judul Dokumen</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
            @foreach ($nomor as $nomor)
            <!-- Modal edit-->
            <div class="modal fade" id="edit{{$nomor->id_dokumen_penomoran}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Penomoran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('nomor.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <label for="exampleInputEmail1" class="col-lg-1">No : </label>
                                        <input class="btn btn-primary" type="button" value="Kode">
                                        <label class="mx-2 my-auto">/</label>
                                        <input class="btn btn-primary" type="button" value="TahunBulanTgl(20220311)">
                                        <label class="mx-2 my-auto">/</label>
                                        <input class="btn btn-primary" type="button" value="NoUrutTiapBulan(II)">
                                        <label class="mx-2 my-auto">/</label>
                                        <input class="btn btn-primary" type="button" value="IDClient(001)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kategori-option">Kategori</label>
                                    <select class="form-control" name="kategori_penomoran">
                                        @foreach ($kategori_penomoran as $kategori_penomorans)
                                        @if ($kategori_penomorans == old('kategori_penomoran'))
                                        <option value="{{ $kategori_penomorans->id_kategori_penomoran }}" selected>
                                            {{ $kategori_penomorans->kategori }}</option>
                                        @else
                                        <option value="{{ $kategori_penomorans->id_kategori_penomoran }}">
                                            {{ $kategori_penomorans->kategori }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Judul Dokumen <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="judul_dokumen"
                                        value="{{ old('Penomoran') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Dokumen</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal show-->
            <div class="modal fade" id="show{{$nomor->id_dokumen_penomoran}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Penomoran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('nomor.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <label for="exampleInputEmail1" class="col-lg-1">No : </label>
                                            <input class="btn btn-primary" type="button" value="{{$nomor->kategori->kode}}">
                                            <label class="mx-2 my-auto">/</label>
                                            
                                            <input class="btn btn-primary" type="button"
                                                value="{{ date('Y', strtotime($nomor->tanggal)).date('m', strtotime($nomor->tanggal)).date('d', strtotime($nomor->tanggal)) }}">
                                            <label class="mx-2 my-auto">/</label>
                                            <input class="btn btn-primary" type="button" value="{{$nomor->romawi}}">
                                            <label class="mx-2 my-auto">/</label>
                                            <input class="btn btn-primary" type="button" value="{{sprintf('%03d',$nomor->id_project)}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori-option">Kategori</label>
                                        <select class="form-control" name="kategori_penomoran"/ disabled readonly>
                                            <option value="{{$nomor->id_kategori_penomoran}}">{{$nomor->kategori->kategori}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>judul Dokumen</label>
                                        <input type="text" class="form-control" id="exampleInputPenomoran"
                                            placeholder="Judul Dokumen" name="judul_dokumen"
                                            value="{{ $nomor->dokumen->judul_dokumen }}" disabled readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="formFile" class="form-label">Dokumen</label>
                                        <input type="text" class="form-control" id="exampleInputPenomoran"
                                            placeholder="Judul Dokumen" name="judul_dokumen"
                                            value="{{ $nomor->dokumen->dokumen }}" disabled readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $nomor->kategori->kategori }}</td>
                <td>{{ $nomor->penomoran }}</td>
                <td>{{ $nomor->dokumen->judul_dokumen }}</td>
                <td>{{ $nomor->dokumen->dokumen }}</td>
                <td>
                    <form method="POST" action="{{ route('nomor.destroy', $nomor) }}" style="display: inline-block;">
                        <button type="button" class="btn btn-secondary btn-xs" data-bs-toggle="modal"
                            data-bs-target="#show{{$nomor->id_dokumen_penomoran}}">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-warning btn-xs" data-bs-toggle="modal"
                            data-bs-target="#edit{{$nomor->id_dokumen_penomoran}}">
                            <i class="fas fa-pen"></i>
                        </button>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger btn-xs" onclick="return confirm('Hapus Data?')"><i
                                class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>

            
            @endforeach
        </table>
    </div>
</div>
<!-- Modal tambah-->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Penomoran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('nomor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <label for="exampleInputEmail1" class="col-lg-1">No : </label>
                            <input type="hidden" name="fileKategori" id="id_kategori1" class="btn btn-primary">
                            <input disabled id="id_kategori" class="btn btn-primary" type="button" value="Kode">

                            <label class="mx-2 my-auto">/</label>
                            <input id="thnblntanggal" type="hidden" name="fileTanggal" class="btn btn-primary"
                                value="TahunBulanTgl">
                            <input id="thnblntanggal1" name="fileTanggal" disabled class="btn btn-primary" type="button"
                                value="TahunBulanTgl">

                            <label class="mx-2 my-auto">/</label>
                            <input id="nourut" name="fileRomawi" type="hidden" class="btn btn-primary"
                                value="NoUrutTiapBulan">
                            <input id="nourut1" name="fileRomawi" disabled class="btn btn-primary" type="button"
                                value="NoUrutTiapBulan">

                            <label class="mx-2 my-auto">/</label>
                            <input id="client_id" name="fileClient" type="hidden" class="btn btn-primary"
                                value="IDClient">
                            <input id="client_id1" name="fileClient" disabled class="btn btn-primary" type="button"
                                value="IDClient">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kategori-option">Project <span class="text-danger">*</span></label>
                        <select id="ketgori" class="form-control" name="kategori_penomoran" onchange="updateKode()">
                            <option value="">Pilih Project</option>
                            @foreach ($kategori_penomoran as $kategori_penomorans)
                            @if($kategori_penomorans->id_kategori_penomoran >=1 &&
                            $kategori_penomorans->id_kategori_penomoran <=4)
                                @if($kategori_penomorans==old('kategori_penomoran')) <option
                                value="{{ $kategori_penomorans->id_kategori_penomoran }}" selected>
                                {{ $kategori_penomorans->kategori }}</option>
                                @else
                                <option value="{{ $kategori_penomorans->id_kategori_penomoran }}">
                                    {{$kategori_penomorans->kategori }}</option>
                                @endif


                                @endif
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategori-option">Nama Client <span class="text-danger">*</span></label>
                        <select id="client" onchange="updateClient()" class="form-control" name="client">
                            <option value="">Pilih Client</option>
                            @foreach ($proyek as $clientData)
                            @if($client == old('client'))
                            <option value="{{$clientData->id_project}}" selected>{{$clientData->nama_project}}
                            </option>
                            @else
                            <option value="{{$clientData->id_project}}">{{$clientData->nama_project}}</option>

                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal <span class="text-danger">*</span></label>
                        <input id="tanggal" class="form-control" placeholder="Tanggal" type="date" name="tanggal"
                            onchange="updateTanggal()" value="{{ old('tanggal') }}" />
                    </div>
                    <div class="form-group">
                        <label>Judul Dokumen <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="judul_dokumen" value="{{ old('Penomoran') }}" />
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Dokumen <span class="text-danger">*</span></label>

                        <div class="custom-file">
                            <label class="custom-file-label" type="file" name="dokumen" id="formFile"
                                value="{{ old('dokumen') }}">Choose file</label>
                            <input type="file" name="dokumen" class="custom-file-input" id="inputGroupFile01">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');

</script>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }

    function updateKode() {
        let id = $("#ketgori").val();
        $.ajax({
            url: "/getKode/" + id,
            success: function (res) {
                // console.log(res);
                switch (res[0].kategori) {
                    case "Penawaran":
                        $("#id_kategori").val("PN");
                        $("#id_kategori1").val("PN");
                        break;
                    case "Penagihan":
                        $("#id_kategori").val("TG");
                        $("#id_kategori1").val("TG");
                        break;

                    case "Invoice":
                        $("#id_kategori").val("INV");
                        $("#id_kategori1").val("INV");
                        break;
                    case "Kontrak":
                        $("#id_kategori").val("SPK");
                        $("#id_kategori1").val("SPK");
                        break;
                    default:
                        $("#id_kategori").val("Kode");
                        $("#id_kategori1").val("Kode");
                        break;
                }
            },
            error: function (err) {
                $("#id_kategori").val('Kode');
            }
        });
    }

    function updateClient() {
        let id = $("#client").val();
        $.ajax({
            url: "/getClient/" + id,
            success: function (res) {
                let num = ('000' + res[0].id_m_klien).substr(-3);
                console.log(num);
                $("#client_id").val(num);
                $("#client_id1").val(num);

            },
            error: function (err) {
                $("#client_id").val('Kode');
            }
        });
    }

    function updateTanggal() {
        let date = new Date($("#tanggal").val());
        let id = date.getMonth() + 1;
        // console.log(id);
        $.ajax({
            url: "/getDate/" + id,
            success: function (res) {
                let num = "" + date.getFullYear() + ((date.getMonth() + 1).toString().padStart(2,
                        "0")) +
                    date.getDate();
                console.log(res);
                $('#thnblntanggal').val(num);
                $('#thnblntanggal1').val(num);
                $('#nourut').val(res.romawi);
                $('#nourut1').val(res.romawi);
            },
            error: function (err) {
                $("#client_id").val('Kode');
            }
        });
    }

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">





</script>
@stop
