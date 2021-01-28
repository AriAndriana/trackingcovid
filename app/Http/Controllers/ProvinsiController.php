<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Support\Facades\DB;
use Auth;

use Validator;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Provinsi::all();
        return view('admin.provinsi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Provinsi::all();
        return view('admin.provinsi.create', compact('data'));
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
            'nama_provinsi.required' => 'Nama Provinsi Harus Diisi',
            'nama_provinsi.max' => 'Nama Provinsi Sudah Maximal',
            'nama_provinsi.min' => 'Nama Provinsi Terlalu Pendek',
            'nama_provinsi.unqiue' => 'Data Sudah Ada',
            'nama_provinsi.numeric' => 'Data Tidak Boleh Menggunakan Angka'
        ];

        $this->validate($request,[
            'nama_provinsi' => 'required|max:50|min:3|unique:provinsis|numeric'
        ],$pesan);

        $provinsi = new Provinsi();
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi')
                ->with(['succes'=>'provinsi berhasil dibuat']);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $provinsi = find($id);
        // return view('admin.provinsi.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('admin.provinsi.edit', \compact('provinsi'));
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
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['message' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();
        return redirect()->route('provinsi.index')->with(['message' => 'Data Berhasil Dihapus']);
    }
}
