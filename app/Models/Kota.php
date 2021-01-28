<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $table = "kotas";
    protected $fillable = ['nama_kota'];
    public $timestamp = true;

    public function kecamatan(){
        return $this->hasMany(Kecamatan::class);
    }
    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'id_provinsi');        
    }
}
