<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaInteresse extends Model
{
    use HasFactory;
    protected $table = "area_interesse";
    protected $guarded = [];

    public function Ainteresses(){
        return $this->hasMany('App\Models\UtilizadorInteresse', 'id_interesse', 'id');
    }
}