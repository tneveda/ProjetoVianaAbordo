<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaInteresse extends Model
{
    use HasFactory;
    protected $table = "area_interesse";
    protected $guarded = [];

    public function users(){
            return $this->belongsToMany(User::class, 'utilizador_interesse', 'id_interesse' , 'id_utilizador');
        
    }
}