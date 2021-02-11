<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasus2;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Rw;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index(){
        $data = Kasus2::all();
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

                            // $provinsi2 = DB::table('provinsis')
                            // ->select('provinsis.nama_provinsi',
                            // DB::raw('SUM(kasus2s.jumlah_positif) as Positif'),
                            // DB::raw('SUM(kasus2s.jumlah_sembuh) as Sembuh'),
                            // DB::raw('SUM(kasus2s.jumlah_meninggal) as Meninggal'))
                            //     ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')    
                            //     ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                            //     ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                            //     ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                            //     ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                            //     ->whereDate('kasus2s.tanggal', date('Y-m-d'))
                            //     ->groupBy('provinsis.id')
                            //     ->get();
                            //     $arr = [
                            //         'status' => 200,
                            //         'data' => [     
                            //         'Hari Ini' =>[$provinsi2],
                            //         'Total' =>[$provinsi]
                            //         ],
                            //         'message' => 'Berhasil'
                            //     ];
                            return view('frontend.index', compact('provinsi', 'data'));
    }
    // public function index(){
    //     $provinsi = Kasus2::with('rw')->get();
    //     return view('frontend.index', compact('provinsi'));
    // }
}
