@extends('adminlte::page')

@section('title', 'Task Project')

@section('content_header')
<h1>Management Task</h1>
@stop

@section('content')
@if (session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
<?php $no = 1; ?>
<div class="card">
    <div class="card-header" style="background-color: #17a2b8;color: #ffffff;">
        <h3 class="card-title"><b>Informasi Project</b></h3>
    </div>
    <div class="card-body">
        <input type="hidden" value="" name="" id="" />
        <input type="hidden" value="" name="" id="" />
        <dl class="row col-sm-8">
            <dt class="col-sm-2">Nama Project </dt>
            <dd class="col-sm-10" id="nama_project">: {{$proyek->nama_project}}</dd>
            <dt class="col-sm-2">Client </dt>
            <dd class="col-sm-10" id="nama_klien">: {{$proyek->klien->nama_perusahaan}}</dd>
            <dt class="col-sm-2">Deadline </dt>
            <dd class="col-sm-10" id="waktu_berakhir">: {{$proyek->waktuberakhir}}</dd>
            {{-- <dt class="col-sm-2">Tingkat </dt>
                <dd class="col-sm-10" id="tingkat"></dd>
                <dt class="col-sm-2">Kelas </dt>
                <dd class="col-sm-10" id="kelas"></dd> --}}
        </dl>
    </div>
</div>
<div class="card card-default">
    <div class="card-body table-responsive">
        <div class="form-group mr-1">
            {{-- <a class="btn btn-primary" href="manPengumuman.create">Tambah</a> --}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i>
                Tambah Task
            </button>
        </div>
        {{-- {{$proyek->logs[1]->user}} --}}
        <!-- Modal Create -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('task.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Task <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="task" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="demo-hor-inputemail">Penerima
                                    Task</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_log_project" id="id_user">
                                        @foreach($proyek->logs as $tim)
                                        <option value="{{$tim->id_log_project}}">{{ $tim->user->nama }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Deadline <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" placeholder="Deadline" name="due_date"
                                        value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="demo-hor-inputemail">Status
                                    Task</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_status_task" id="">
                                        @foreach($data['status_task'] as $status)
                                        <option value="{{$status->id_status_task}}">{{$status->status_task}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Task <span class="text-danger">*</span></label>
                                <div class="col-sm-14">
                                    <textarea id="summernote" class="summernote" name="summernote"
                                        value="{{ old('hasil') }}"></textarea>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah Task</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>



        <table class="table table-bordered table-striped table-hover mb-0" id="example1">
            <thead>
                <tr>
                    <th width="5%">
                        <center>No</center>
                    </th>
                    <th width="15%">
                        <center>Task</center>
                    </th>
                    <th width="15%">
                        <center>Penerima Task</center>
                    </th>
                    <th width="15%">
                        <center>Deadline</center>
                    <th width="15%">
                        <center>Status Task</center>
                    </th>
                    <th width="15%">
                        <center>Action</center>
                    </th>
                </tr>
            </thead>

            @foreach ($proyek->logs as $tim)
            @foreach ($tim->tasks as $task)

            {{-- @php
                // $statusTask = App\Models\StatusTask::find($tes->id_status_task);
            @endphp --}}


            <!-- Modal Edit -->
            <div class="modal fade" id="editTask{{$task->id_task}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/task.lead/update/{{$task->id_task}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- @method('PUT') --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Task <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="nama_task"
                                            value="{{old('nama_task', $task->task)}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">Penerima
                                        Task</label>
                                    <div class="col-sm-10">

                                        <select class="form-control" name="penerima_task" id="id_user">

                                            @foreach($proyek->logs as $tims)
                                            @if ($tims->id_log_project == $task->id_log_project)

                                            <option value="{{$tims->id_log_project}}" selected>{{ $tims->user->nama }}</option>
                                            @else

                                            <option value="{{$tims->id_log_project}}">{{ $tims->user->nama }}</option>
                                            @endif

                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Deadline <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" placeholder="Deadline" name="Deadline"
                                            value="{{old('Deadline', date("Y-m-d", strtotime($task->due_date)))}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">Status
                                        Task</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_status_task" id="">
                                            @php
                                            $listofstatus = App\Models\statusTask::all();
                                            @endphp
                                            @foreach ($listofstatus as $liststatus)
                                            @if ($liststatus->id_status_task == $task->id_status_task)
                                            <option value="{{$liststatus->id_status_task}}" selected>{{$liststatus->status_task}}</option>
                                            @else
                                            <option value="{{$liststatus->id_status_task}}">{{$liststatus->status_task}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Task <span class="text-danger">*</span></label>
                                    <div class="col-sm-14">
                                        <textarea id="summernote" class="summernote" name="summernote">{{$task->deskripsi}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="submit"></button> --}}
                                <button type="submit" class="btn btn-primary">Update Task</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Show -->
            <div class="modal fade" id="showTask{{$task->id_task}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Task <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="nama" disabled
                                            value="{{$task->task}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">Penerima
                                        Task</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="penerima_task" id="id_user" disabled>
                                            <option value="0">{{$tim->user->nama}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Deadline <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" placeholder="Deadline" name="Deadline"
                                            disabled value="{{date("Y-m-d", strtotime($task->due_date))}}" />

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">Status
                                        Task</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" disabled name="nama" id="">
                                            <option value="0">{{$task->statusTask->status_task}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi Task<span class="text-danger">*</span></label>
                                    <div class="card">
                                        <div class="card-body">
                                        <input type="hidden" value="" name="" id="" />
                                        <dl class="row col-sm-20">
                                            <dd class="col-sm-15">{{--{{ $task->deskripsi }}--}} {!!$task->deskripsi!!} </dt>
                                        </dl>
            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>File <span class="text-danger">*</span></label>
                                    <div class="card">
                                        <div class="card-body">
                                        <input type="hidden" value="" name="" id="" />
                                        <dl class="row col-sm-20">
                                            <dd class="col-sm-15">file yang dikirim anggota (tulisan, link, foto) </dt>
                                        </dl>
                                        </div>
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
                <td>
                    <center>{{ $no++ }}</center>
                </td>
                <td>
                    <center>{{$task->task}}</center>
                </td>
                <td>
                    <center>{{$tim->user->nama}}</center>
                </td>
                <td>
                    <center>{{$task->due_date}}</center>
                </td>
                <td>

                    <center>
                        @if ($task->statusTask->status_task == "Revisi")
                        
                            <a class="btn btn-sm btn-warning" target="_blank"
                            href="">{{$task->statusTask->status_task ?? ''}}</a>
                        
                        @elseif ($task->statusTask->status_task == "Proses")
                        
                            <a class="btn btn-sm btn-primary" target="_blank"
                            href="">{{$task->statusTask->status_task ?? ''}}</a>
                        
                        @else
                        
                            <a class="btn btn-sm btn-success" target="_blank"
                            href="">{{$task->statusTask->status_task ?? ''}}</a>
                        
                        @endif

                    </center>
                </td>
                <td>
                    <div class="form-group mr-1">
                        <center>
                            <button type="button" class="btn btn-sm btn-secondary modal-title" data-toggle="modal"
                                data-target="#showTask{{$task->id_task}}">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-warning modal-title" data-toggle="modal"
                                data-target="#editTask{{$task->id_task}}">
                                <i class="fas fa-pen"></i>
                            </button>
                            <form method="POST" action="/task.lead/delete/{{$task->id_task}}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </center>
                    </div>
                </td>
            </tr>
            </tbody>





            {{-- <tbody> --}}
            @endforeach
            @endforeach

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

    // $('#example1').DataTable({
    //     "responsive": true,
    // });

</script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(function () {
        // Summernote
        // let data = $('summernote').value;
        // console.log(data);
        // $('#summernote').value
        $('.summernote').summernote()

    })
    $(function () {
        // Summernote
        $('.summernote1').summernote("disable")
    })
    $(function () {
        // Summernote
        $('.summernote2').summernote("disable")
    })
    $('#example1').DataTable({
        "responsive": true,
    });
    let route = ''

</script>
@stop