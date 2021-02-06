<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinsis = [
            ['nama_provinsi' => "ACEH"],
			['nama_provinsi' => "SUMATERA UTARA"],
			['nama_provinsi' => "SUMATERA BARAT"],
			['nama_provinsi' => "RIAU"],
			['nama_provinsi' => "JAMBI"],
			['nama_provinsi' => "SUMATERA SELATAN"],
			['nama_provinsi' => "BENGKULU"],
			['nama_provinsi' => "LAMPUNG"],
			['nama_provinsi' => "KEPULAUAN BANGKA BELITUNG"],
			['nama_provinsi' => "KEPULAUAN RIAU"],
			['nama_provinsi' => "DKI JAKARTA"],
			['nama_provinsi' => "JAWA BARAT"],
			['nama_provinsi' => "JAWA TENGAH"],
			['nama_provinsi' => "DI YOGYAKARTA"],
			['nama_provinsi' => "JAWA TIMUR"],
			['nama_provinsi' => "BANTEN"],
			['nama_provinsi' => "BALI"],
			['nama_provinsi' => "NUSA TENGGARA BARAT"],
			['nama_provinsi' => "NUSA TENGGARA TIMUR"],
			['nama_provinsi' => "KALIMANTAN BARAT"],
			['nama_provinsi' => "KALIMANTAN TENGAH"],
			['nama_provinsi' => "KALIMANTAN SELATAN"],
			['nama_provinsi' => "KALIMANTAN TIMUR"],
			['nama_provinsi' => "KALIMANTAN UTARA"],
			['nama_provinsi' => "SULAWESI UTARA"],
			['nama_provinsi' => "SULAWESI TENGAH"],
			['nama_provinsi' => "SULAWESI SELATAN"],
			['nama_provinsi' => "SULAWESI TENGGARA"],
			['nama_provinsi' => "GORONTALO"],
			['nama_provinsi' => "SULAWESI BARAT"],
			['nama_provinsi' => "MALUKU"],
			['nama_provinsi' => "MALUKU UTARA"],
			['nama_provinsi' => "PAPUA BARAT"],
			['nama_provinsi' => "PAPUA"]
			
        ];
        DB::table('provinsis')->insert($provinsis);
    }
}
