<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstname' => 'Rofrigo',
            'lastname' => 'Oliveira',
            'email' => 'contato@rodrigo.com',
            'password' => bcrypt('12345678'), //criptografando a senha
        ]);
    }
}
