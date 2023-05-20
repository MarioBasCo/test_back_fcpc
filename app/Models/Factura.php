<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'facturas';
    protected $fillable = ['establecimiento', 'punto_emision', 'numero_factura', 'fecha', 'cliente_id', 'subtotal', 'total_iva', 'total'];

    // Relación con el modelo Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relación con el modelo Detalle
    public function detalles()
    {
        return $this->hasMany(Detalle::class);
    }
}
