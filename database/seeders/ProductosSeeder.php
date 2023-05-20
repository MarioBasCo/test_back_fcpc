<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            [
                'codigo' => 'P001',
                'descripcion' => 'Producto 1',
                'precio' => 10.99,
                'categoria' => 'Electrónica',
            ],
            [
                'codigo' => 'P002',
                'descripcion' => 'Producto 2',
                'precio' => 19.99,
                'categoria' => 'Ropa',
            ],
            [
                'codigo' => 'P003',
                'descripcion' => 'Producto 3',
                'precio' => 5.99,
                'categoria' => 'Hogar',
            ],
            [
                'codigo' => 'P004',
                'descripcion' => 'Producto 4',
                'precio' => 7.99,
                'categoria' => 'Electrodomésticos',
            ],
            [
                'codigo' => 'P005',
                'descripcion' => 'Producto 5',
                'precio' => 14.99,
                'categoria' => 'Electrónica',
            ],
            [
                'codigo' => 'P006',
                'descripcion' => 'Producto 6',
                'precio' => 9.99,
                'categoria' => 'Ropa',
            ],
            [
                'codigo' => 'P007',
                'descripcion' => 'Producto 7',
                'precio' => 12.99,
                'categoria' => 'Hogar',
            ],
            [
                'codigo' => 'P008',
                'descripcion' => 'Producto 8',
                'precio' => 6.99,
                'categoria' => 'Electrodomésticos',
            ],
        ];
        
        foreach ($productos as $p) {
            Producto::create($p);
        }
    }
}
