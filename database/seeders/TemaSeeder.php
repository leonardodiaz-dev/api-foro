<?php

namespace Database\Seeders;

use App\Models\SubForo;
use App\Models\Tema;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $temas = [
            [
                'titulo' => '¿Cómo aprender Laravel desde cero?',
                'contenido' => 'Estoy empezando con Laravel y me gustaría saber por dónde comenzar. ¿Algún consejo o recurso recomendado?'
            ],
            [
                'titulo' => 'Errores comunes en React y cómo evitarlos',
                'contenido' => 'Comparto una lista de errores que suelen ocurrir cuando trabajamos con React, y cómo solucionarlos.'
            ],
            [
                'titulo' => '¿Vale la pena aprender Python en 2025?',
                'contenido' => 'Con tantos lenguajes disponibles, quisiera saber si Python sigue siendo una buena opción.'
            ],
            [
                'titulo' => 'Mejores prácticas para escribir código limpio',
                'contenido' => '¿Qué principios o técnicas aplican ustedes para mantener su código organizado y fácil de entender?'
            ],
            [
                'titulo' => '¿Qué editor de código prefieren y por qué?',
                'contenido' => 'Estoy probando diferentes editores de código y me gustaría saber cuál es su favorito y por qué.'
            ],
            [
                'titulo' => '¿Frontend o Backend? ¿Cuál elegir?',
                'contenido' => 'Estoy indeciso entre especializarme en frontend o backend. ¿Qué opinan ustedes?'
            ],
            [
                'titulo' => '¿Qué es Git y por qué debería aprenderlo?',
                'contenido' => 'He escuchado mucho sobre Git, pero no sé exactamente qué es ni cómo se usa.'
            ],
            [
                'titulo' => 'Mi primera experiencia con una API REST',
                'contenido' => 'Hoy consumí mi primera API REST en una aplicación y fue más fácil de lo que pensé.'
            ],
            [
                'titulo' => 'Errores al usar base de datos en Laravel',
                'contenido' => 'Quise hacer una relación entre dos tablas, pero algo salió mal. ¿Cómo debuguean ustedes estos errores?'
            ],
            [
                'titulo' => '¿Cómo organizan sus carpetas en proyectos grandes?',
                'contenido' => 'Quisiera saber cómo estructuran sus proyectos cuando ya tienen muchas vistas, controladores y componentes.'
            ],
            [
                'titulo' => '¿Qué opinan sobre la Inteligencia Artificial en la programación?',
                'contenido' => '¿Creen que las herramientas como ChatGPT reemplazarán a los programadores en el futuro?'
            ],
            [
                'titulo' => 'Recomendaciones de cursos online gratuitos',
                'contenido' => '¿Tienen páginas o canales donde aprender desarrollo web sin pagar?'
            ],
            [
                'titulo' => '¿Cómo ser más productivo programando?',
                'contenido' => 'A veces siento que pierdo mucho tiempo. ¿Usan alguna técnica para enfocarse mejor?'
            ],
            [
                'titulo' => '¿Cómo enfrentan el síndrome del impostor?',
                'contenido' => 'Soy estudiante y a veces siento que no avanzo o que no soy suficientemente bueno. ¿Algún consejo?'
            ],
            [
                'titulo' => '¿Qué tan importante es saber inglés como programador?',
                'contenido' => 'Mi nivel de inglés no es muy alto, pero veo que casi todo está en inglés. ¿Hasta qué punto debería aprenderlo?'
            ],
            [
                'titulo' => '¿Python o JavaScript para empezar a programar?',
                'contenido' => 'Estoy comenzando en la programación y me gustaría saber cuál lenguaje me conviene aprender primero.'
            ],
            [
                'titulo' => '¿Es necesario tener título universitario para trabajar en tecnología?',
                'contenido' => 'Muchos dicen que se puede trabajar solo con cursos, pero otros recomiendan ir a la universidad. ¿Qué opinan?'
            ],
            [
                'titulo' => '¿Cuáles son los frameworks más usados en 2025?',
                'contenido' => 'Estoy buscando actualizarme y no sé cuáles son los frameworks más populares actualmente.'
            ],
            [
                'titulo' => '¿Cómo empezar en la ciberseguridad?',
                'contenido' => 'Me interesa mucho el área de seguridad informática pero no sé por dónde comenzar. ¿Algún consejo?'
            ],
            [
                'titulo' => '¿Trabajar como freelancer o en una empresa?',
                'contenido' => 'Estoy considerando mis opciones y me gustaría saber qué camino les ha funcionado mejor a ustedes.'
            ],
            [
                'titulo' => '¿Se puede vivir solo de crear contenido en YouTube?',
                'contenido' => 'Me gusta enseñar programación en videos, pero no sé si eso puede ser una fuente de ingresos estable.'
            ],
            [
                'titulo' => '¿Qué portátil recomiendan para programar?',
                'contenido' => 'Busco una laptop buena para programar que no sea muy cara. ¿Qué especificaciones debería tener?'
            ],
            [
                'titulo' => '¿Vale la pena aprender C en 2025?',
                'contenido' => 'Siento que es un lenguaje muy antiguo, pero algunos dicen que es importante para entender cómo funciona todo.'
            ],
            [
                'titulo' => '¿Qué tan difícil es conseguir prácticas profesionales?',
                'contenido' => 'Estoy por terminar mi carrera y me preocupa no encontrar prácticas. ¿Cómo fue su experiencia?'
            ],
            [
                'titulo' => '¿Cómo organizar el tiempo para estudiar y trabajar?',
                'contenido' => 'Estoy llevando cursos y trabajando al mismo tiempo. ¿Cómo logran equilibrar ambas cosas?'
            ]
        ];
        foreach ($temas as $tema) {
            Tema::create([
                'titulo' => $tema['titulo'],
                'slug' => Tema::slug($tema['titulo']),
                'contenido' => $tema['contenido'],
                'user_id' => User::all()->random()->id,
                'subforo_id' =>SubForo::all()->random()->id
            ]);
        }
    }
}
