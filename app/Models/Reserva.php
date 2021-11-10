<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = "reserva";
    protected $guarded = [];

    public function agenda() {
        return $this->BelongsTo('App\Models\Agenda', 'id_agenda');
    }
}
