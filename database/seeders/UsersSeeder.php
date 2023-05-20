<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newUser = new User();
        $newUser->name = 'admin';
        $newUser->email = 'admin2@gmail.com';
        $newUser->password = Hash::make('123456789');
        $newUser->role = 'administrador';
        $newUser->save();

        $newUser2 = new User();
        $newUser2->name = 'José Armijos';
        $newUser2->email = 'vendedor@gmail.com';
        $newUser2->password = Hash::make('123456789');
        $newUser2->role = 'vendedor';
        $newUser2->save();
    
        $newUser3 = new User();
        $newUser3->name = 'Gabriela López';
        $newUser3->email = 'supervisor@gmail.com';
        $newUser3->password = Hash::make('123456789');
        $newUser3->role = 'supervisor';
        $newUser3->save();
    }
}
