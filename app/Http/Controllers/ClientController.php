<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data';
        $data['clients'] = $request->client;
        $data['clients'] = client::where('nama_perusahaan', 'like', '%' . $request->client . '%')
                            ->get();
        return view('client.client', $data);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['title'] = 'Tambah';
        return view('client.create', $data);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'nama_perusahaan' => 'required',
            'nama_klien' => 'required',
            'bidang' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $client = new client();
        $client->nama_perusahaan = $request->nama_perusahaan;
        $client->nama_klien = $request->nama_klien;
        $client->bidang = $request->bidang;
        $client->email = $request->email;
        $client->no_hp = $request->no_hp;
        $client->alamat = $request->alamat;
        $client->save();
        return redirect()->back()->with('success', 'Tambah Berhasil');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        $data['nama_perusahaan'] = ['nama_perusahaan'];
        $data['nama_klien'] = ['nama_klien'];
        $data['waktumulai'] = ['waktumulai'];
        $data['bidang'] = ['bidang'];
        $data['email'] = ['email'];
        $data['no_hp'] = ['no_hp'];
        $data['alamat'] = ['alamat'];
        $data['client'] = $client;
        return view('client.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data['title'] = 'Ubah';
        // $data['client'] = $client;
        // return view('client.edit', $data);
        //
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
            'nama_perusahaan' => 'required',
            'nama_klien' => 'required',
            'bidang' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);
        $client = client::find($id);


        // $client = client::where('id_m_klien',$id_m_klien)->first();

        // $client = client::find($id);
        $client->nama_perusahaan = $request->nama_perusahaan;
        $client->nama_klien = $request->nama_klien;
        $client->bidang = $request->bidang;
        $client->email = $request->email;
        $client->no_hp = $request->no_hp;
        $client->alamat = $request->alamat;
        // dd($client);
        $client->save();
        return redirect()->back()->with('success', 'Ubah Berhasil');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        client::destroy($id);
        // $client->delete();
        return redirect()->back()->with('success', 'Hapus Berhasil');
        //
    }
}
