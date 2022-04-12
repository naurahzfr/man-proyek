<?php

namespace App\Http\Controllers;

use App\Models\nomor;
use Illuminate\Http\Request;
use App\Models\client;
use App\Models\proyek;
use App\Models\m_dokumen;
use App\Models\kategori_penomoran;
use Illuminate\Support\Facades\Storage;

class NomorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'nomor';
        $data['q'] = $request->q;
        $data['kategori_penomoran'] = kategori_penomoran::all();
        $data['proyek'] = proyek::all();
        $data['nomor'] = Nomor::all();
        $data['client'] = client::all();

        return view('nomor.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request)
    // {
    //     $data['title'] = 'Tambah';
    //     $data['categories'] = $m_kategori_penomoran->kategori;
    //         return view('nomor.create',$data);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'tanggal'=>'required',
            'judul_dokumen' => 'required',
            'dokumen' => 'required',
            'kategori_penomoran' => 'required',
            'client'=>'required',
        ]);

        $m_dokumen = new m_dokumen();
        
        $file = $request->file('dokumen');
        $file_names = $request->fileKategori.'-'.$request->fileTanggal.'-'.$request->fileRomawi.'-'.$request->fileClient.'.'.$file->getClientOriginalExtension();
        
        $m_dokumen->judul_dokumen= $request->judul_dokumen;
        $m_dokumen->dokumen = 'dokumen/'.$file_names;
        Storage::putFileAs('public/dokumen', $file, $file_names);
        $m_dokumen->save();
        // dd($m_dokumen);

        $penomoran = new nomor();
        $penomoran->id_kategori_penomoran = $request->kategori_penomoran;
        $penomoran->id_project = $request->client;
        $penomoran->id_dokumen = $m_dokumen->id_dokumen;
        $penomoran->tanggal = $request->tanggal;
        $penomoran->penomoran = $request->fileKategori.'/'.$request->fileTanggal.'/'.$request->fileRomawi.'/'.$request->fileClient;
        $penomoran->save();
        // dd($penomoran);




        // $file_name = 

        // if ($request->hasFile('file')) {
        //     $file = $request->file('file');
        //     $name = time()."_".$file->getClientOriginalName();
        //     $file->move(public_path().'file/dokumenproject', $name);
        //     $m_dokumen->dokumen = $name;
        // }
        //     $m_dokumen->save();

        //     $nomor = new Nomor();
        //     $dokumen->id_dokumen = $m_dokumen->id_dokumen;
        //     $nomor->tanggal = $request->tanggal;
        //     $nomor->penomoran = $request->penomoran;
        //     $nomor->id_kategori_penomoran = $request->id_kategori_penomoran;
        //     $nomor->id_project = $request->id_project;
        //     $nomor->save();
        return redirect()->back()->with('success', 'Tambah Berhasil');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nomor  $nomor
     * @return \Illuminate\Http\Response
     */
    public function show(nomor $nomor)
    {
          return view('nomor.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nomor  $nomor
     * @return \Illuminate\Http\Response
     */
    public function edit(nomor $nomor)
   {
        $data['title'] = 'Ubah';
        $data['list'] = $nomor;
        $data['categories'] = $nomor->m_kategori_penomoran->kategori;
        // $data['categories'] = $nomor->kategori;
        // $data['categories'] = ['Laki-Laki', 'Perempuan'];
        return view('nomor.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nomor  $nomor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nomor $nomor)
    {
            $request->validate([
            'Dokumen' => 'required',
            'Penomoran' => 'required',
            'Kategori' => 'required',
        ]);

        $nomor = new Nomor();
        $nomor->Dokumen = $request->Dokumen;
        $nomor->Penomoran = $request->Penomoran;
        $nomor->Kategori = $request->Kategori;
        $nomor->save();
         return redirect('nomor')->with('success', 'Tambah Berhasil');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nomor  $nomor
     * @return \Illuminate\Http\Response
     */
    public function destroy(nomor $nomor)
    {
        $nomor->delete();
        return redirect('nomor')->with('success', 'Hapus Data Berhasil');
    }


    public function getKode($id){
        $data = kategori_penomoran::where('id_kategori_penomoran', $id)->get();
        return response()->json($data);
    }
    public function getClient($id){
        $data = client::where('id_m_klien', $id)->get();
        return response()->json($data);
    }
    public function getDate($id){
        $data = nomor::all();
        $count = 1;
        if($data->isEmpty()){
            $arr = array(
                'romawi'=> 'I',
            );
            return response()->json($arr);
        }
        else{
            $target = nomor::where(date('m', 'tanggal'), $id)->get();
            // foreach($data as $item){

            // }
        }
    }
}
