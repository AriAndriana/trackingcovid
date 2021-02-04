<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kasus2;
use DB;

class ApiController extends Controller
{
    public function provinsi()
    {
        $provinsi = DB::table('provinsis')
                    ->select('provinsis.nama_provinsi',
                    DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))
                        ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')    
                        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                        ->groupBy('provinsis.id')
                        ->get();
                    return response()->json($provinsi, 200);    

    }
    public function showKasus($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi = DB::table('provinsis')
                    ->select('provinsis.nama_provinsi',
                    DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))
                        ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')    
                        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                        ->where('provinsis.id', $id)
                        ->groupBy('provinsis.id')
                        ->get();
                    return response()->json($provinsi, 200);    

    }
}
