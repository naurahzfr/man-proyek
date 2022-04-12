<?php

namespace App\Http\Controllers;

use App\Models\Mom;
use App\Models\jadwalmeeting;
use App\Models\Proyek;
use Illuminate\Http\Request;
use PDF;

class MomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data';
        $data['jadwalmeeting'] = jadwalmeeting::all();
        $data['proyek'] = Proyek::all();
        $data['q'] = $request->q;
        $data['mom'] = Mom::all();
        return view('mom.mom', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['title'] = 'Tambah';
        // $data['categories'] = ['Laki-Laki', 'Perempuan'];
        return view('mom.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'final_id' => 'required',
            'hasil_pembahasan' => 'required',
        ]);
        $mom = new Mom();
        $desc = $request->hasil_pembahasan;
        $desc = str_replace('<p>', '', $desc);
        $desc = str_replace('</p>', '', $desc);
        $desc = str_replace('<br>', '', $desc);
        $mom->id_jadwal_meeting = $request->final_id;
        $mom->hasil_pembahasan = $desc;
        // dd($mom);
        $mom->save();
        return redirect()->back()->with('success', 'Tambah Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Mom $mom)
    {
        return view('mom.show', [
        
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function edit(Mom $id_mom)
    {
    $where = array('id_mom' => $id_mom);
            $post  = Mom::where($where)->first();
        
            return response()->json($post);
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
        $request->validate([
            'hasil_pembahasan' => 'required',
        ]);
        $desc = $request->hasil_pembahasan;
        $desc = str_replace('<p>', '', $desc);
        $desc = str_replace('</p>', '', $desc);
        $desc = str_replace('<br>', '', $desc);
        $mom = Mom::find($id);
        $mom->hasil_pembahasan = $desc;
        // dd($mom);
        $mom->save();
        return redirect()->back()->with('success', 'Update Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Mom::destroy($id);
        return redirect()->back()->with('success', 'Hapus Berhasil');
    }

    public function exportpdf(){
        $data = Mom::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('mom.mom-pdf');
        return $pdf->download('mom.pdf');
    }
    public function getTanggal($id){
        $mom = jadwalmeeting::where('id_project', $id)->get();
        // dd($mom);
        return response()->json($mom);
    }

    public function getTempat($id){
        $mom = jadwalmeeting::where('id_jadwal_meeting', $id)->get();
        return response()->json($mom);
    }
    public function getAgenda($id){
        $mom = jadwalmeeting::where('id_jadwal_meeting', $id)->get();
        return response()->json($mom);
    }
}