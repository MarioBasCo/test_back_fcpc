<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['codigo', 'descripcion', 'precio', 'categoria'];

    // Relación con la tabla de detalles
    public function detalles()
    {
        return $this->hasMany(Detalle::class);
    }

    // Relación con la tabla de descuentos
    public function descuentos()
    {
        return $this->hasMany(Descuento::class);
    }
}
