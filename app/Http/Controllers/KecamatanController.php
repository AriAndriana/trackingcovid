<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kecamatan::all();
        $kota = Kota::all();
        $provinsi = Provinsi::all();
        return view('admin.kecamatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Kecamatan::all();
        $kota = Kota::all();
        $provinsi = Provinsi::all();
        return view('admin.kecamatan.create', compact('data', 'kota', 'provinsi'));
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
            'nama_kecamatan.required' => 'Nama Kecamatan Harus Diisi',
            'nama_kecamatan.min' => 'Nama Kecamatan Terlalu Pendek',
            'nama_kecamatan.max' => 'Nama Kecamatan Sudah Maximal',
            'nama_kecamatan.unique' => 'Data Sudah Ada',
            'kode_kecamatan.required' => 'Kode Kecamatan Harus Diisi',
            'kode_kecamatan.min' => 'Kode Kecamatan Terlalu Pendek',
            'kode_kecamatna.max' => 'Kode Kecamatan Terlalu Panjang'
        ];

        $request->validate([
            'nama_kecamatan' => 'required|max:50|min:3|unique:kecamatans',
            'kode_kecamatan' => 'required|max:12|min:2'
        ], $pesan);

        $kecamatan = new Kecamatan;
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->withSuccess('Data Berhasil Ditambahkan!');
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
        $kecamatan = Kecamatan::findOrFail($id);
        $kota = Kota::all();
        return view('admin.kecamatan.edit', compact('kecamatan', 'kota'));
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
        $kecamatan = kecamatan::findOrFail($id);
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->withSuccess('Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->withSuccess('Data Berhasil Dihapus!');
    }
}
