@extends('adminlte::page')

@section('title', 'Task Project')

@section('content_header')
    <h1>Management Task</h1>
@stop

@section('content')
    @if (session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    <div class="card">
        <div class="card-header" style="background-color: #17a2b8;color: #ffffff;">
            <h3 class="card-title"><b>Informasi Project</b></h3>
        </div>
        <div class="card-body">
            <input type="hidden" value="" name="" id="" />
            <input type="hidden" value="" name="" id="" />
            <dl class="row col-sm-8">
                <dt class="col-sm-2">Nama Project </dt>
                <dd class="col-sm-10" id="nama_project">: Web Pengelolaan Produk A-Box</dd>
                <dt class="col-sm-2">Client </dt>
                <dd class="col-sm-10" id="nama_klien">: A-Box</dd>
                <dt class="col-sm-2">Deadline </dt>
                <dd class="col-sm-10" id="waktu_berakhir">: 2022-05-07</dd>
                {{-- <dt class="col-sm-2">Tingkat </dt>
                <dd class="col-sm-10" id="tingkat"></dd>
                <dt class="col-sm-2">Kelas </dt>
                <dd class="col-sm-10" id="kelas"></dd> --}}
            </dl>
        </div>
    </div>
    <!-- Modal Upload -->
    <div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Upload Task</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" enctype="multipart/form-data">
                              @csrf
                             <div class="card">
                                <div class="card-body">
                                <input type="hidden" value="" name="" id="" />
								<dl class="row col-sm-6">
									<dt class="col-sm-6">Penerima Task </dt>
									<dd class="col-sm-15" id="nama">: Nana</dd>
									<dt class="col-sm-6">Task </dt>
									<dd class="col-sm-15" id="task">: Analisis Sistem</dd>
									<dt class="col-sm-6">Deadline </dt>
									<dd class="col-sm-15" id="deadline task">: 2022-02-28</dd>
									<dt class="col-sm-6">Status Task </dt>
									<dd class="col-sm-15" id="status task"> : Selesai</dd>
							    </dl>
                                </div>
                             </div>
                             <div class="form-group">
                                    <label>Deskripsi Task<span class="text-danger">*</span></label>
                                    <div class="card">
                                        <div class="card-body">
                                        <input type="hidden" value="" name="" id="" />
                                        <dl class="row col-sm-20">
                                            <dd class="col-sm-15">Deskripsi task dari lead </dt>
                                        </dl>
                                        </div>
                                    </div>
                                </div>
                             <div class="form-group">
                                    <label>Upload Task <span class="text-danger">*</span></label>
                                    <div class="col-sm-14">
                                        <textarea
                                            id="summernote" name="hasil" value="{{ old('hasil') }}"></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Upload</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
							</div>
            </form>
            </div>
          </div>
        </div>
      </div>
	  
	    <!-- Modal Show -->
    <div class="modal fade" id="show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Task</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" enctype="multipart/form-data">
                              @csrf
                             <input type="hidden" value="" name="" id="" />
								<dl class="row col-sm-8">
									<dt class="col-sm-8">Penerima Task </dt>
									<dd class="col-sm-15" id="task">: Helena Putri</dd>
									<dt class="col-sm-8">Task </dt>
									<dd class="col-sm-15" id="task">: Design UI</dd>
									<dt class="col-sm-8">Deadline </dt>
									<dd class="col-sm-15" id="deadline task">: 22-07-03</dd>
									<dt class="col-sm-8">Status Task </dt>
									<dd class="col-sm-15" id="status task"> : Proses</dd>
							</dl>
                            <div class="form-group">
                                    <label>Deskripsi Task<span class="text-danger">*</span></label>
                                    <div class="card">
                                        <div class="card-body">
                                        <input type="hidden" value="" name="" id="" />
                                        <dl class="row col-sm-20">
                                            <dd class="col-sm-15">Deskripsi task dari lead </dt>
                                        </dl>
                                        </div>
                                    </div>
                                </div>
							<div class="form-group">
                                    <label>Task Upload<span class="text-danger">*</span></label>
                                    <div class="card">
                                        <div class="card-body">
                                        <input type="hidden" value="" name="" id="" />
                                        <dl class="row col-sm-20">
                                            <dd class="col-sm-15">file yang dikirim anggota (tulisan, link, foto) </dt>
                                        </dl>
                                        </div>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
							</div>
            </form>
            </div>
          </div>
        </div>
      </div>  
	
	    <!-- Modal Edit -->
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" enctype="multipart/form-data">
                              @csrf
                             <div class="card">
                                <div class="card-body">
                                <input type="hidden" value="" name="" id="" />
								<dl class="row col-sm-6">
									<dt class="col-sm-6">Penerima Task </dt>
									<dd class="col-sm-15" id="nama">: Nana</dd>
									<dt class="col-sm-6">Task </dt>
									<dd class="col-sm-15" id="task">: Analisis Sistem</dd>
									<dt class="col-sm-6">Deadline </dt>
									<dd class="col-sm-15" id="deadline task">: 2022-02-28</dd>
									<dt class="col-sm-6">Status Task </dt>
									<dd class="col-sm-15" id="status task"> : Selesai</dd>
							    </dl>
                                </div>
                             </div>
                             <div class="form-group">
                                    <label>Deskripsi Task<span class="text-danger">*</span></label>
                                    <div class="card">
                                        <div class="card-body">
                                        <input type="hidden" value="" name="" id="" />
                                        <dl class="row col-sm-20">
                                            <dd class="col-sm-15">Deskripsi task dari lead </dt>
                                        </dl>
                                        </div>
                                    </div>
                                </div>
                             <div class="form-group">
                                    <label>Upload Task <span class="text-danger">*</span></label>
                                    <div class="col-sm-14">
                                        <textarea
                                            id="summernote1" name="hasil" value="{{ old('hasil') }}"></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Upload</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
							</div>
            </form>
            </div>
          </div>
        </div>
      </div>
	
    <div class="card card-default">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-striped table-hover mb-0" id="example1">
                <thead>
                    <tr>
                        <th width="5%">
                            <center>No</center>
                        </th>
                        <th width="15%">
                            <center>Task</center>
                        </th>
                        <th width="10%">
                            <center>Deadline</center>
                        <th width="10%">
                            <center>Status Task</center>
                        </th>
                        <th width="10%">
                            <center>Upload Task</center>
                        </th>
						<th width="10%">
                            <center>Action</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <center>1</center>
                        </td>
                        <td>
                            <center> Analisis Sistem</center>
                        </td>
                        <td>
                            <center>2022-02-28</center>
                        </td>
                        <td>
                            <center><a class="btn btn-sm btn-success" target="_blank" href="">Selesai</a>
                            </center>
                        </td>
                        <td>
                            <div class="form-group mr-1">
                                <center><button type="button" class="btn btn-sm btn-info modal-title" data-toggle="modal" data-target="#upload">
                                    <i class="fas fa-upload"></i>
                                    Upload
                                </button></center>
                            </div>
                        </td>
						<td>
							<center>
                            <div class="form-group mr-1">
                                <button type="button" class="btn btn-sm btn-warning modal-title" data-toggle="modal" data-target="#edit">
                                    <i class="fas fa-pen"></i>
                                </button>
								<button type="button" class="btn btn-sm btn-secondary modal-title" data-toggle="modal" data-target="#show">
                                    <i class="fas fa-eye"></i>
                                </button>
							</div>
                            </center>
						</td>
                        
                    </tr>
                    <tr>
                        <td>
                            <center>2</center>
                        </td>
                        <td>
                            <center> Perancangan Database</center>
                        </td>
                        <td>
                            <center>2022-03-03</center>
                        </td>
                        <td>
                            <center><a class="btn btn-sm btn-success" target="_blank" href="">Selesai</a>
                            </center>
                        </td>
                        <td>
                            <div class="form-group mr-1">
                                <center><button type="button" class="btn btn-sm btn-info modal-title" data-toggle="modal" data-target="#upload">
                                    <i class="fas fa-upload"></i>
                                    Upload
                                </button></center>
                            </div>
                        </td>
						<td>
							<center>
                            <div class="form-group mr-1">
                                <button type="button" class="btn btn-sm btn-warning modal-title" data-toggle="modal" data-target="#edit">
                                    <i class="fas fa-pen"></i>
                                </button>
								<button type="button" class="btn btn-sm btn-secondary modal-title" data-toggle="modal" data-target="#show">
                                    <i class="fas fa-eye"></i>
                                </button>
							</div>
                            </center>
						</td>
                    </tr>
                    <tr>
                        <td>
                            <center>3</center>
                        </td>
                        <td>
                            <center> Pemodelan Database</center>
                        </td>
                        <td>
                            <center>2022-04-02</center>
                        </td>
                        <td>
                            <center><a class="btn btn-sm btn-success" target="_blank" href="">Proses</a>
                            </center>
                        </td>
                        <td>
                            <div class="form-group mr-1">
                                <center><button type="button" class="btn btn-sm btn-info modal-title" data-toggle="modal" data-target="#upload">
                                    <i class="fas fa-upload"></i>
                                    Upload
                                </button></center>
                            </div>
                        </td>
						<td>
							<center>
                            <div class="form-group mr-1">
                                <button type="button" class="btn btn-sm btn-warning modal-title" data-toggle="modal" data-target="#edit">
                                    <i class="fas fa-pen"></i>
                                </button>
								<button type="button" class="btn btn-sm btn-secondary modal-title" data-toggle="modal" data-target="#show">
                                    <i class="fas fa-eye"></i>
                                </button>
							</div>
                            </center>
						</td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@stop

@section('js')
    <script>
        console.log('Hi!');

        $('#example1').DataTable({
            "responsive": true,
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()
        })
        $(function() {
            // Summernote
            $('#summernote1').summernote()
        })
        $(function() {
            // Summernote
            $('#summernote2').summernote()
        })
        $('#example1').DataTable({
            "responsive": true,
        });
    </script>
@stop