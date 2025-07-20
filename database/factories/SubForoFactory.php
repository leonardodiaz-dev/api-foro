<?php

namespace Database\Factories;

use App\Models\Foro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubForo>
 */
class SubForoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $subforos = [
            [
                'nombre' => 'Laravel',
                'descripcion' => 'Subforo dedicado al framework PHP Laravel, consultas, paquetes y buenas prácticas.'
            ],
            [
                'nombre' => 'React',
                'descripcion' => 'Todo sobre React JS, hooks, componentes, estados y rutas.'
            ],
            [
                'nombre' => 'Vue.js',
                'descripcion' => 'Preguntas y recursos sobre Vue, Composition API, Vue Router y Vuex.'
            ],
            [
                'nombre' => 'MySQL',
                'descripcion' => 'Subforo para consultas sobre bases de datos relacionales, optimización y consultas SQL.'
            ],
            [
                'nombre' => 'PostgreSQL',
                'descripcion' => 'Trucos, funciones avanzadas y problemas comunes en PostgreSQL.'
            ],
            [
                'nombre' => 'API REST',
                'descripcion' => 'Diseño, consumo y documentación de APIs RESTful.'
            ],
            [
                'nombre' => 'Docker',
                'descripcion' => 'Uso de contenedores, Docker Compose y despliegue de aplicaciones.'
            ],
            [
                'nombre' => 'Firebase',
                'descripcion' => 'Autenticación, Firestore, y otros servicios de Firebase para el desarrollo moderno.'
            ],
            [
                'nombre' => 'Inteligencia Artificial',
                'descripcion' => 'Subforo para hablar sobre modelos de IA, machine learning, y uso de herramientas como ChatGPT.'
            ],
            [
                'nombre' => 'Diseño UX/UI',
                'descripcion' => 'Diseño centrado en el usuario, herramientas como Figma y prototipado.'
            ],
        ];

        $subforo = $subforos[array_rand($subforos)];

        return [
            'nombre' => $subforo['nombre'],
            'slug' => Str::slug($subforo['nombre']) . '-' . $this->faker->unique()->numberBetween(100, 999),
            'descripcion' => $subforo['descripcion'],
            'foro_id' => Foro::all()->random()->id,
        ];
    }
}
