<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    // use HasFactory;
    public function pedidoDetalle()
    {
        return $this->hasMany(PedidoProducto::class)->with('producto');
    }
}
