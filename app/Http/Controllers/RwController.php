<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rw;
use App\Models\Kelurahan;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Rw::all();
        $kelurahan = Kelurahan::all();
        return view('admin.rw.index', \compact('data', 'kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Rw::all();
        $kelurahan = Kelurahan::all();
        return view('admin.rw.create', compact('data', 'kelurahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesan=[
            'nama.required' => 'Nama Rw Harus Diisi',
        ];

        $this->validate($request,[
            'nama' => 'required'
        ],$pesan);

        $data = new Rw();
        $data->id_kelurahan = $request->id_kelurahan;
        $data->nama = $request->nama;
        $data->save();
        return \redirect()->route('rw.index', \compact('data'))->withSuccess('Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Rw::findOrFail($id);
        $kelurahan = Kelurahan::all();
        return view('admin.rw.edit', compact('data', 'kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Rw::findOrFail($id);
        $data->id_kelurahan = $request->id_kelurahan;
        $data->nama = $request->nama;
        $data->save();
        return redirect()->route('rw.index', \compact('data'))->withSuccess('Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Rw::findOrFail($id);
        $data->delete();
        return redirect()->route('rw.index', compact('data'))->withSuccess('Data Berhasil Dihapus!');
    }
}
