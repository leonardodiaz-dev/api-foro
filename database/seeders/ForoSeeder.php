<?php

namespace Database\Seeders;

use App\Models\Foro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $nombres = [
            'Programación Web',
            'Desarrollo Móvil',
            'Inteligencia Artificial',
            'Base de Datos',
            'Seguridad Informática',
            'Redes y Comunicaciones',
            'Frontend y Diseño UI/UX',
            'Backend y APIs',
            'Carrera y Empleabilidad',
            'Proyectos Personales',
        ];
        foreach ($nombres as $nombre) {
            Foro::create([
                'nombre' => $nombre,
                'slug' => Foro::slug($nombre),
            ]);          
        }
    }
}
