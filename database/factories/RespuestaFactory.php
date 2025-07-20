<?php

namespace Database\Factories;

use App\Models\Tema;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Respuesta>
 */
class RespuestaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $respuestas = [
            'Puedes comenzar con la documentación oficial de Laravel, es muy clara y tiene ejemplos paso a paso.',
            'React es muy útil si aprendes bien el manejo de estados y el sistema de componentes.',
            'Python sigue siendo muy demandado, sobre todo en ciencia de datos e inteligencia artificial.',
            'Yo recomiendo practicar con pequeños proyectos, así aplicas lo que aprendes en tiempo real.',
            'Lo más importante es tener lógica de programación, el lenguaje viene después.',
            'He tenido problemas similares, te recomiendo revisar los logs o activar el modo debug.',
            'Para organizar carpetas, uso una estructura por módulos. Me ayuda a escalar el proyecto.',
            'Git es fundamental si trabajas en equipo o en proyectos medianos a grandes.',
            'Puedes usar VS Code con extensiones como ESLint y Prettier para mejorar tu código.',
            'Si quieres ser más productivo, intenta aplicar la técnica Pomodoro y usar un planificador de tareas.',
            'No te preocupes, todos hemos pasado por el síndrome del impostor. Lo importante es seguir practicando.',
            'Yo uso MySQL en producción y nunca he tenido problemas, solo asegúrate de usar índices.',
            'En cuanto a APIs, Postman es una gran herramienta para probar y depurar endpoints.',
            "Yo empecé con JavaScript y me pareció bastante accesible.",
            "Depende mucho de tus objetivos, pero Python es más amigable para principiantes.",
            "No es obligatorio, pero tener un título puede abrir más puertas en algunas empresas.",
            "En mi experiencia, aprendí más trabajando en proyectos reales que en la universidad.",
            "React y Vue siguen siendo muy populares, pero también está creciendo Svelte.",
            "Lo importante es tener una base sólida antes de meterte en un framework.",
            "Puedes empezar por aprender redes y algo de Linux si te interesa la ciberseguridad.",
            "Yo uso TryHackMe y Hack The Box para practicar, son muy buenas plataformas.",
            "Trabajar como freelancer te da libertad, pero al inicio puede ser inestable.",
            "En una empresa aprendes mucho y tienes estabilidad, pero también menos flexibilidad.",
            "Sí se puede vivir de YouTube, pero toma tiempo y constancia.",
            "Es mejor combinar YouTube con otras fuentes de ingresos al principio.",
            "Una laptop con al menos 16GB de RAM y SSD va bien para programar.",
            "Busca que tenga buen procesador y pantalla cómoda, eso ayuda bastante.",
            "Aprender C te da mucha comprensión del sistema, vale la pena si te interesa lo bajo nivel.",
            "Yo aprendí C en la universidad y me ayudó a entender cómo funcionan otros lenguajes.",
            "Las prácticas se consiguen más fácil si tienes proyectos en GitHub.",
            "Haz networking, participa en eventos o comunidades online, eso ayuda mucho.",
            "Usar una agenda y priorizar tareas me ha salvado muchas veces.",
            "No te sobrecargues, también necesitas tiempo para descansar."
        ];

        return [
            'contenido' => $respuestas[array_rand($respuestas)],
            'user_id' => User::all()->random()->id,
            'tema_id' => Tema::all()->random()->id,
        ];
    }
}
