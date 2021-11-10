<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaNoticia extends Model
{
    use HasFactory;
    protected $table = "galeria_noticias";
    protected $guarded = [];

    public function noticia() {
        return $this->BelongsTo('App\Models\Noticia', 'id_noticia');
    }
}
