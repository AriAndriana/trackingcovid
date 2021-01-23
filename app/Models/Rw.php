<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;

    protected $table = "rws";

    public function kasus2(){
        return $this->hasMany(Kasus2::class);
    }
    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class);
    }
}