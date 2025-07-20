<?php

namespace Database\Factories;

use App\Models\Foro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Foro>
 */
class ForoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
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
            'DevOps y Cloud',
            'Soporte Técnico',
            'Carrera y Empleabilidad',
            'Proyectos Personales',
            'Hardware y Ensamblaje',
            'Sistemas Operativos',
            'Noticias y Tendencias TI',
        ];

        $nombre = $nombres[array_rand($nombres)];

        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre) . '-' . $this->faker->unique()->numberBetween(100, 999),
        ];
    }
}
