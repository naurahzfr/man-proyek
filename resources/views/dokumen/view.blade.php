@extends('adminlte::page')

@section('title', 'Management Dokumen')

@section('content_header')
<h1>Management Dokumen</h1>
@stop

@section('content')
@if (session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
<div class="card">
    <?php $no = 1; ?>

    <div class="card-header" style="background-color: #17a2b8;color: #ffffff;">
        <h3 class="card-title"><b>Informasi Project</b></h3>
    </div>
    <div class="card-body">
        <input type="hidden" value="" name="" id="" />
        <input type="hidden" value="" name="" id="" />
        <dl class="row col-sm-8">
            <dt class="col-sm-3">Nama Project </dt>
            <dd class="col-sm-7" id="nama_project">: {{$proyek->nama_project}}</dd>
            <dt class="col-sm-3">Nama Client </dt>
            <dd class="col-sm-7" id="nama_klien">: {{$proyek->klien->nama_perusahaan}}</dd>
            <dt class="col-sm-3">Deadline </dt>
            <dd class="col-sm-7" id="waktu_berakhir">: {{$proyek->waktuberakhir}}</dd>
        </dl>
    </div>
</div>
<div class="card card-default">
    <div class="card-header">
        <form class="form-inline">
            <div class="form-group mr-1">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                    <i class="fas fa-plus"></i>
                    Tambah Dokumen
                </button>
            </div>
        </form>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped table-hover mb-0" id="example2">
            <thead>
                <tr>
                    <th>
                        <center>No</center>
                    </th>
                    <th>
                        <center>Jenis Dokumen</center>
                    </th>
                    <th>
                        <center>File</center>
                    </th>
                    <th>
                        <center>Aksi</center>
                    </th>
                </tr>
            </thead>
            
        
            @foreach ($dokumen as $dokumen)

            <!-- Modal edit -->
            <div class="modal fade" id="edit{{$dokumen->id_dokumen_status_project}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Dokumen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <div class="form-group row">
                                    <label class="col-sm-3" for="kategori-option">Kategori <span
                                            class="text-danger">*</span></label>
                                    <select class="col-sm-9 form-control" name="kategori_penomoran">
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
            
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Judul Dokumen <span class="text-danger">*</span></label>
                                    <input class="form-control col-sm-9" type="text" name="judul_dokumen"
                                        value="{{ old('judul_dokumen') }}" />
                                </div>
            
                                <div class="form-group row">
                                    <label for="formFile" class="form-label col-sm-3">Dokumen</label>
                                    <input class="col-sm-9 form-control" type="file" name="dokumen" id="formFile"
                                        accept="application/pdf">
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-danger" data-bs-dismiss="modal">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>
<!-- modal show -->
<div class="modal fade" id="show{{$dokumen->id_dokumen_status_project}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label class="col-sm-3" for="kategori-option">Kategori <span
                                class="text-danger">*</span></label>
                        <select class="col-sm-9 form-control" name="kategori_penomoran" / disabled readonly>
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

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Judul Dokumen <span class="text-danger">*</span></label>
                        <input class="form-control col-sm-9" type="text" name="judul_dokumen"
                            value="{{ old('judul_dokumen') }}" / disabled readonly>
                    </div>

                    <div class="form-group row">
                        <label for="formFile" class="form-label col-sm-3">Dokumen</label>
                        <input class="col-sm-9 form-control" type="file" name="dokumen" id="formFile"
                            accept="application/pdf" / disabled readonly>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger" data-bs-dismiss="modal">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $dokumen->kategori }}</td>
                <td>{{ $dokumen->dokumen }}</td>
                <td>
                    <a href="" class="btn btn-sm btn-secondary modal-title" id="exampleModalLabel"
                        data-bs-toggle="modal" data-bs-target="#show{{$dokumen->id_dokumen_status_project}}"><i class="fas fa-eye"></i></a>
                    <a href="" class="btn btn-sm btn-warning modal-title" id="exampleModalLabel" data-bs-toggle="modal"
                        data-bs-target="#edit{{$dokumen->id_dokumen_status_project}}"><i class="fas fa-pen"></i></a>
                    <form method="POST" action="{{ route('dokumen.destroy', $dokumen) }}"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </table>
    </div>
</div>
<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label class="col-sm-3" for="kategori-option">Kategori <span
                                class="text-danger">*</span></label>
                        <select class="col-sm-9 form-control" name="kategori_penomoran">
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

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Judul Dokumen <span class="text-danger">*</span></label>
                        <input class="form-control col-sm-9" type="text" name="judul_dokumen"
                            value="{{ old('judul_dokumen') }}" />
                    </div>

                    <div class="form-group row">
                        <label for="formFile" class="form-label col-sm-3">Dokumen</label>
                        <input class="col-sm-9 form-control" type="file" name="dokumen" id="formFile"
                            accept="application/pdf">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" data-bs-dismiss="modal">Kembali</a>
                    </div>
                </form>
            </div>
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

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

</script>
<script>
    $('#huruf').bind('keypress', alphaOnly);

    function alphaOnly(event) {
        var value = String.fromCharCode(event.which);
        var pattern = new RegExp(/[a-zA-Z]/i);
        return pattern.test(value);
    }

</script>
<script>
    $('#bukanangka').bind('keypress', alphaOnly);

    function alphaOnly(event) {
        var value = String.fromCharCode(event.which);
        var pattern = new RegExp(/[a-zA-Z]/i);
        return pattern.test(value);
    }

</script>
@stop