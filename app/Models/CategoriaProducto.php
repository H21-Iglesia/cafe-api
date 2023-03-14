<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    use HasFactory;
    public function detalleCategoria()
    {
        return $this->hasOne(Categoria::class,'id','categoria_id');
    }
}
