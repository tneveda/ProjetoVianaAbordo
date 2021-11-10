<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoContacto extends Model
{
    use HasFactory;
    protected $table = "pedido_contacto";
    protected $guarded = [];
}
