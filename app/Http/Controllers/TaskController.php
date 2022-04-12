<?php

namespace App\Http\Controllers;

use App\Models\MTask;
use App\Models\Task;
use App\Models\Proyek;
use App\Models\client;
use App\Models\Statusproject;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data';
        $data['q'] = $request->q;
        $data['proyek'] = Proyek::where('nama_project', 'like', '%' . $request->q . '%')
                             ->join('m_klien', 'm_klien.id_m_klien', '=', 'm_project.id_m_klien')
                             ->get();
        return view('task.task', $data);
    }

    public function store(Request $request)
    {
        $mTask = new MTask();
        $mTask->id_log_project = $request->id_log_project;
        $mTask->id_status_task = $request->id_status_task;
        $mTask->task = $request->task;
        $mTask->due_date = $request->due_date;
        $desc = $request->summernote;
        // while($desc.startsWith('<p><br></p>')){
        $desc = str_replace('<p>', '', $desc);
        $desc = str_replace('</p>', '', $desc);
        $desc = str_replace('<br>', '', $desc);
        // }
        $mTask->deskripsi = $desc;
        $mTask->status_aktif = 1;
        // dd($mTask);
        $mTask->save();

        return back()->with('success', 'Tambah task berhasil!');
    }

    public function view(Request $request)
    {
        // $data['title'] = 'Data';
        // $data['q'] = $request->q;
        // $data['proyek'] = Proyek::all();
        // $data['status_project'] = Statusproject::all();
        // $data['task'] = Task::where('task', 'like', '%' . $request->q . '%')
        //                     ->join('m_status_project', 'm_status_project.id_status_project', '=', 't_dokumen_status_project.id_status_project')
        //                     ->get();
        // return view('task.lead', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    //     $data['title'] = 'Tambah';
    //     return view('task.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lead(Request $request)
    {
        return view('task.lead');
        // $request->validate([
        //     'Nama' => 'required',
        //     'alamat' => 'required',
        //     'email' => 'required',
        //     'nohp' => 'required',
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);

        // $task = new task();
        // $task->Nama = $request->Nama;
        // $task->alamat = $request->alamat;
        // $task->email = $request->email;
        // $task->nohp = $request->nohp;
        // $task->save();
        // $task->username = $request->username;
        // $task->password = $request->password;

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $name = rand(1000, 9999) . $image->getClientOriginalName();
        //     $image->move('images/post', $name);
        //     $post->image = $name;
        // }
        return redirect()->back()->with('success', 'Tambah Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        $data['title'] = 'Detail';
        $data['Nama'] = ['Nama'];
        $data['alamat'] = ['alamat'];
        $data['email'] = ['email'];
        $data['nohp'] = ['nohp'];
        $data['username'] = ['username'];
        $data['password'] = ['password'];
        $data['task'] = $task;
        return view('task.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        $data['title'] = 'Ubah';
        $data['task'] = $task;
        // $data['tas']
        return view('task.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'Nama' => 'required',
        //     'alamat' => 'required',
        //     'no_telp' => 'required',
        //     'gmail' => 'required',
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);
        // dd($request);
        $task = Mtask::find($id);
        $task->task = $request->nama_task != $task->task ? $request->nama_task :$task->task;
        $task->id_log_project = $request->penerima_task != $task->id_log_project ? $request->penerima_task : $task->id_log_project;
        $task->due_date = $request->Deadline != $task->due_date ? $request->Deadline :$task->due_date;
        $task->deskripsi = $request->summernote != $task->deskripsi ? $request->summernote :$task->deskripsi;
        $task->id_status_task = $request->id_status_task != $task->id_status_task ? $request->id_status_task : $task->id_status_task;
        // if ($request->hasFile('image')) {
        //     $post->delete_image();
        //     $image = $request->file('image');
        //     $name = rand(1000, 9999) . $image->getClientOriginalName();
        //     $image->move('images/post', $name);
        //     $post->image = $name;
        // }
        // dd($task);
        $task->save();
        return redirect()->back()->with('success', 'Ubah Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        // $task->delete();
        MTask::destroy($id);
        return redirect()->back()->with('success', 'Hapus Berhasil');
    }
}
