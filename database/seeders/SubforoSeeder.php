<?php

namespace Database\Seeders;

use App\Models\Foro;
use App\Models\SubForo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubforoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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
            [
                'nombre' => 'Python',
                'descripcion' => 'Discusión sobre Python, librerías populares como Pandas, NumPy, Flask y más.'
            ],
            [
                'nombre' => 'Java',
                'descripcion' => 'Consultas sobre Java, programación orientada a objetos, Spring Boot y patrones de diseño.'
            ],
            [
                'nombre' => 'TypeScript',
                'descripcion' => 'Temas relacionados al tipado en JavaScript con TypeScript y su integración con frameworks.'
            ],
            [
                'nombre' => 'Node.js',
                'descripcion' => 'Backend con JavaScript, Express, control de rutas y middlewares.'
            ],
            [
                'nombre' => 'Ciberseguridad',
                'descripcion' => 'Análisis de vulnerabilidades, hacking ético y mejores prácticas de seguridad.'
            ],
            [
                'nombre' => 'DevOps',
                'descripcion' => 'Automatización, CI/CD, infraestructura como código y herramientas como Jenkins y GitLab CI.'
            ],
            [
                'nombre' => 'Scrum y Gestión Ágil',
                'descripcion' => 'Metodologías ágiles, roles, sprints, herramientas y experiencias en equipos de desarrollo.'
            ],
            [
                'nombre' => 'Proyectos Personales',
                'descripcion' => 'Comparte tus proyectos, recibe feedback y conecta con otros desarrolladores.'
            ],
            [
                'nombre' => 'Carrera en TI',
                'descripcion' => 'Consejos sobre empleabilidad, entrevistas técnicas, portafolios y crecimiento profesional.'
            ],
            [
                'nombre' => 'Desarrollo Móvil',
                'descripcion' => 'Temas sobre Flutter, React Native, Android y iOS nativo.'
            ]
        ];
        foreach ($subforos as $subforo) {
            SubForo::create([
                'nombre' => $subforo['nombre'],
                'slug' => SubForo::slug($subforo['nombre']),
                'descripcion' => $subforo['descripcion'],
                'foro_id' => Foro::all()->random()->id
            ]);
        }
    }
}
