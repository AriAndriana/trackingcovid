<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table ="kecamatans";
    protected $fillable = ['kode_kecamatan', 'nama_kecamatan'];
    public $timestamp = true;

    public function kelurahan(){
        return $this->hasMany(Kelurahan::class);
    }
    public function kota(){
        return $this->belongsTo(Kota::class, 'id_kota');
    }
}
