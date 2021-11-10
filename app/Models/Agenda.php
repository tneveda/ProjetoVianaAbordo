<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = "agenda";
    protected $guarded = [];

    public function reservas(){
        return $this->hasMany('App\Models\Reserva', 'id_agenda', 'id');
    }

    public function imagens(){
        return $this->hasMany('App\Models\GaleriaAgenda', 'id_agenda', 'id');
    }
}
