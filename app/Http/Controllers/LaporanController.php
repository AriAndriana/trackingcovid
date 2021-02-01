<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rw;

use App\Models\Kasus2;

class LaporanController extends Controller  
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = Kasus2::with('rw')->get();
        return view('admin.laporan.index',compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kasus = new Kasus2();
        $kasus->id_rw = $request->id_rw;
        $kasus->jumlah_positif = $request->jumlah_positif;
        $kasus->jumlah_sembuh = $request->jumlah_sembuh;
        $kasus->jumlah_meninggal = $request->jumlah_meninggal;
        $kasus->tanggal = $request->tanggal;
        $kasus->save();
        return redirect()->route('laporan.index');
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
        $laporan = Kasus2::findOrFail($id);
        return view('admin.laporan.edit',compact('laporan'));
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
        $laporan = Kasus2::findOrFail($id);
        $laporan -> id_rw = $request->id_rw;
        $laporan -> jumlah_positif = $request->jumlah_positif;
        $laporan -> jumlah_sembuh = $request->jumlah_sembuh;
        $laporan -> jumlah_meninggal = $request->jumlah_meninggal;
        $laporan -> tanggal = $request->tanggal;
        $laporan ->save();
        return redirect()->route('laporan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporan = Kasus2::findOrFail($id);
        $laporan->delete();
        return redirect()->route('laporan.index');
    }
}
