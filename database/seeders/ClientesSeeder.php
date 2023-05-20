<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = [
            [
                'identificacion' => '1234567890',
                'nombre' => 'Juan Perez',
                'direccion' => 'Calle Principal 123',
                'telefono' => '1234567890',
                'correo' => 'juan@example.com',
            ],
            [
                'identificacion' => '0987654321',
                'nombre' => 'María Rodríguez',
                'direccion' => 'Avenida Central 456',
                'telefono' => '9876543210',
                'correo' => 'maria@example.com',
            ],
            [
                'identificacion' => '9876543210',
                'nombre' => 'Pedro Gómez',
                'direccion' => 'Calle Secundaria 789',
                'telefono' => '5678901234',
                'correo' => 'pedro@example.com',
            ],
            [
                'identificacion' => '4567890123',
                'nombre' => 'Ana López',
                'direccion' => 'Avenida Principal 456',
                'telefono' => '3456789012',
                'correo' => 'ana@example.com',
            ],
            [
                'identificacion' => '2345678901',
                'nombre' => 'Carlos Sánchez',
                'direccion' => 'Calle Secundaria 789',
                'telefono' => '9012345678',
                'correo' => 'carlos@example.com',
            ],
        ];
        
        foreach ($clientes as $c) {
            Cliente::create($c);
        }
    }
}
