<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function imagens(){
        return $this->hasMany('App\Models\GaleriaNoticia', 'id_noticia', 'id');
    }
}
