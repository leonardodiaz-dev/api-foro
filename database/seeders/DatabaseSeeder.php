<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Foro;
use App\Models\Respuesta;
use App\Models\SubForo;
use App\Models\Tema;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'username' => 'leonardo1234',
            'email' => 'leonardo@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('12345678')
        ]);
        // $this->call(
        //     [
        //         ForoSeeder::class,
        //         SubforoSeeder::class,
        //         TemaSeeder::class,
        //         RespuestaSeeder::class
        //     ]
        // );
        // Foro::factory(10)->create();
        // SubForo::factory(40)->create();
        // Tema::factory(100)->create();
        // Respuesta::factory(500)->create();
    }
}
