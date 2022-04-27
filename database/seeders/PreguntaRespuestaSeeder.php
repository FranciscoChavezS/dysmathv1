<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pregunta;
use App\Models\Respuesta;

class PreguntaRespuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta::truncate();
        Respuesta::truncate();
        $preguntaYRespuesta = $this->obtenerDatos();

        $preguntaYRespuesta->each(function ($pregunta) {
            $crearPregunta = Pregunta::create([
                'texto' => $pregunta['pregunta'],
                'puntos' => $pregunta['puntos'],
            ]);

            collect($pregunta['respuesta'])->each(function ($respuesta) use ($crearPregunta) {
                Respuesta::create([
                    'pregunta_id' => $crearPregunta->id,
                    'texto' => $respuesta['texto'],
                    'correcta' => $respuesta['correcta'],
                ]);
            });
        });
    }
    private function obtenerDatos()
    {
    return collect([
        [
            'pregunta' => '¿Cuántas mariposas y abejas hay en total? 🦋🦋🦋🦋🐝🐝🐝🐝🐝🐝🐝🐝',
            'puntos' => '1',
            'respuesta' => [
                ['texto' => '11', 'correcta' => false],
                ['texto' => '10', 'correcta' => false],
                ['texto' => '12', 'correcta' => true],
            ],
        ],
        [
            'pregunta' => '¿Cuántas manzanas y naranjas hay en total? 🍏🍏🍏🍏🍏🍏🍏🍊🍊🍊🍊🍊🍊',
            'puntos' => '1',
            'respuesta' => [
                ['texto' => '12', 'correcta' => false],
                ['texto' => '10', 'correcta' => false],
                ['texto' => '13', 'correcta' => true],
            ],
        ],
        [
            'pregunta' => '¿Cuántos dados y lentes hay en total? 🎲🎲🎲🎲🎲🎲👓👓👓👓',
            'puntos' => '1',
            'respuesta' => [
                ['texto' => '11', 'correcta' => false],
                ['texto' => '9', 'correcta' => false],
                ['texto' => '10', 'correcta' => true],
            ],
        ],
        [
            'pregunta' => '¿Cuántas hojas y flores hay en total? 🌳🌳🌳🌳🌳🌳🌳🌺🌺🌺🌺🌺🌺🌺',
            'puntos' => '1',
            'respuesta' => [
                ['texto' => '16', 'correcta' => false],
                ['texto' => '15', 'correcta' => false],
                ['texto' => '14', 'correcta' => true],
            ],
        ],
        [
            'pregunta' => '¿Cuántos libros y cuadernos hay en total? 📔📔📔📔📔📔📔📒📒📒📒📒',
            'puntos' => '1',
            'respuesta' => [
                ['texto' => '11', 'correcta' => false],
                ['texto' => '10', 'correcta' => false],
                ['texto' => '12', 'correcta' => true],
            ],
        ],
        [
            'pregunta' => '¿Cuántas fresas y cerezas hay en total? 🍓🍓🍓🍓🍓🍒🍒🍒🍒🍒🍒',
            'puntos' => '1',
            'respuesta' => [
                ['texto' => '15', 'correcta' => false],
                ['texto' => '12', 'correcta' => false],
                ['texto' => '11', 'correcta' => true],
            ],
        ],
        [
            'pregunta' => '¿Cuántas galletas quedarán si cada niño se come una? 🙎‍♂️🙎🍪🍪🍪🍪🍪🍪',
            'puntos' => '1',
            'respuesta' => [
                ['texto' => '5', 'correcta' => false],
                ['texto' => '3', 'correcta' => false],
                ['texto' => '4', 'correcta' => true],
            ],
        ],
        [
            'pregunta' => '¿Cuántas bananas quedarán si cada chango se come una? 🐵🐵🐵🐵🍌🍌🍌🍌🍌🍌🍌🍌',
            'puntos' => '1',
            'respuesta' => [
                ['texto' => '6', 'correcta' => false],
                ['texto' => '5', 'correcta' => false],
                ['texto' => '4', 'correcta' => true],
            ],
        ],
        [
            'pregunta' => '¿Cuántos huesos quedarán si cada perrito se come uno? 🐶 🐶 🐶 🐶 🐶 🦴🦴🦴🦴🦴🦴🦴🦴🦴🦴',
            'puntos' => '1',
            'respuesta' => [
                ['texto' => '8', 'correcta' => false],
                ['texto' => '6', 'correcta' => false],
                ['texto' => '5', 'correcta' => true],
            ],
        ],
        [
            'pregunta' => '¿Cuántos regalos quedarán si cada niño toma uno? 👧🧒👩🎁🎁🎁🎁🎁🎁🎁🎁🎁',
            'puntos' => '1',
            'respuesta' => [
                ['texto' => '4', 'correcta' => false],
                ['texto' => '8', 'correcta' => false],
                ['texto' => '6', 'correcta' => true],
            ],
        ],
        [
            'pregunta' => '¿Cuántas zanahorias quedarán si cada conejo se come una? 🐇🐇🐇🐇🐇🐇🥕🥕🥕🥕🥕🥕🥕🥕🥕🥕🥕🥕',
            'puntos' => '1',
            'respuesta' => [
                ['texto' => '5', 'correcta' => false],
                ['texto' => '7', 'correcta' => false],
                ['texto' => '6', 'correcta' => true],
            ],
        ],
    ]);
    }
}
