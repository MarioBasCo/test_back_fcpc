<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $table = 'detalles';
    protected $fillable = ['factura_id', 'producto_id', 'cantidad', 'unidad_medida', 'precio', 'iva', 'subtotal'];

    // Relación con el modelo Factura
    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
