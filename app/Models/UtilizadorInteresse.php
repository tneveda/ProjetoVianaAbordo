<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilizadorInteresse extends Model
{

    use HasFactory;
    protected $table = "utilizador_interesse";
    protected $guarded = [];

    public function areaInteresse(){
        return $this->BelongsTo('App\Models\utilizadorInteresse', 'id_interesse');
    }

    public function user(){
        return $this->BelongsTo('App\Models\User', 'id_utilizador');
    }
}