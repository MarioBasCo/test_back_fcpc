<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'identificacion',
        'nombre',
        'direccion',
        'telefono',
        'correo',
    ];

    // Relación con la tabla Factura
    public function facturas()
    {
        return $this->hasMany(Factura::class);
    } 
}
