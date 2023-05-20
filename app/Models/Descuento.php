<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table = 'descuentos';
    protected $fillable = ['producto_id', 'porcentaje', 'monto'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}