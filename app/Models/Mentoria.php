<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentoria extends Model
{
    use HasFactory;
    protected $table = "mentoria";
    protected $guarded = [];

    public function mentores(){
        return $this->belongsTo(User::class, 'id_mentor');
    }


    public function mentorandos(){
        return $this->belongsToMany(User::class, 'utilizador_mentoria','id_mentoria', 'id_mentorando');
    }

    public function interesses(){
        return $this->belongsTo(AreaInteresse::class, 'id_interesse');
    }



   
}
