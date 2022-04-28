<?php

namespace Database\Seeders;

use App\Models\Pregunta8;
use App\Models\Respuesta8;
use Illuminate\Database\Seeder;

class PreguntaRespuesta8Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta8::truncate();
        Respuesta8::truncate();
        $preguntaYRespuesta8 = $this->obtenerDatos8();

        $preguntaYRespuesta8->each(function ($pregunta8) {
            $crearPregunta8 = Pregunta8::create([
                'texto8' => $pregunta8['pregunta8'],
                'puntos8' => $pregunta8['puntos8'],
            ]);

            collect($pregunta8['respuesta8'])->each(function ($respuesta8) use ($crearPregunta8) {
                Respuesta8::create([
                    'pregunta8_id' => $crearPregunta8->id,
                    'texto8' => $respuesta8['texto8'],
                    'correcta8' => $respuesta8['correcta8'],
                ]);
            });
        });
    }
    private function obtenerDatos8()
    {
    return collect([
        [
            'pregunta8' => 'Roberto tiene 5 libros. Pierde 1. ¿Cuántos libros le quedan?',
            'puntos8' => '1',
            'respuesta8' => [
                ['texto8' => '5', 'correcta8' => false],
                ['texto8' => '3', 'correcta8' => false],
                ['texto8' => '4', 'correcta8' => true],
            ],
        ],
        [
            'pregunta8' => '¿Cuántos son 2 crayolas más 3 crayolas?',
            'puntos8' => '1',
            'respuesta8' => [
                ['texto8' => '7', 'correcta8' => false],
                ['texto8' => '6', 'correcta8' => false],
                ['texto8' => '5', 'correcta8' => true],
            ],
        ],
        [
            'pregunta8' => 'Juan tenía $4 pesos y su mamá le dio $2 más. ¿Cuántos pesos tiene en total?',
            'puntos8' => '1',
            'respuesta8' => [
                ['texto8' => '$5 pesos', 'correcta8' => false],
                ['texto8' => '$7 pesos', 'correcta8' => false],
                ['texto8' => '$6 pesos', 'correcta8' => true],
            ],
        ],
        [
            'pregunta8' => 'Si tengo 5 peras y me como 2. ¿Cuántas peras me quedan?',
            'puntos8' => '1',
            'respuesta8' => [
                ['texto8' => '5', 'correcta8' => false],
                ['texto8' => '2', 'correcta8' => false],
                ['texto8' => '3', 'correcta8' => true],
            ],
        ],
        [
            'pregunta8' => 'Marcos tenía 4 naranjas y compró 3 más. ¿Cuántas naranjas tiene en total?',
            'puntos8' => '1',
            'respuesta8' => [
                ['texto8' => '4', 'correcta8' => false],
                ['texto8' => '8', 'correcta8' => false],
                ['texto8' => '7', 'correcta8' => true],
            ],
        ],
        [
            'pregunta8' => '¿Cuántas son 5 chocolates más 4 chocolates?',
            'puntos8' => '1',
            'respuesta8' => [
                ['texto8' => '5', 'correcta8' => false],
                ['texto8' => '10', 'correcta8' => false],
                ['texto8' => '9', 'correcta8' => true],
            ],
        ],
        [
            'pregunta8' => 'Tengo 5 pesos y me encontré 2 pesos más. ¿Cuántos pesos tengo en total?',
            'puntos8' => '1',
            'respuesta8' => [
                ['texto8' => '10', 'correcta8' => false],
                ['texto8' => '8', 'correcta8' => false],
                ['texto8' => '7', 'correcta8' => true],
            ],
        ],
        [
            'pregunta8' => 'Laura tenía 6 globos y vendió 4. ¿Cuántos globos le quedaron?',
            'puntos8' => '1',
            'respuesta8' => [
                ['texto8' => '3', 'correcta8' => false],
                ['texto8' => '5', 'correcta8' => false],
                ['texto8' => '2', 'correcta8' => true],
            ],
        ],
        [
            'pregunta8' => 'Si tengo 4 perros y 3 gatos. ¿Cuántas mascotas tengo?',
            'puntos8' => '1',
            'respuesta8' => [
                ['texto8' => '6', 'correcta8' => false],
                ['texto8' => '8', 'correcta8' => false],
                ['texto8' => '7', 'correcta8' => true],
            ],
        ],
        [
            'pregunta8' => 'Ana tiene 9 paletas y le dio 4 a su amiga. ¿Cuántas paletas le quedan?',
            'puntos8' => '1',
            'respuesta8' => [
                ['texto8' => '4', 'correcta8' => false],
                ['texto8' => '6', 'correcta8' => false],
                ['texto8' => '5', 'correcta8' => true],
            ],
        ],
        [
            'pregunta8' => 'Pedro tiene 6 jugos y se tomó 2. ¿Cuántos jugos le quedan?',
            'puntos8' => '1',
            'respuesta8' => [
                ['texto8' => '8', 'correcta8' => false],
                ['texto8' => '5', 'correcta8' => false],
                ['texto8' => '4', 'correcta8' => true],
            ],
        ],
        [
            'pregunta8' => 'Tengo 7 zanahorias y compré 5 más. ¿Cuántas zanahorias tengo en total?',
            'puntos8' => '1',
            'respuesta8' => [
                ['texto8' => '10', 'correcta8' => false],
                ['texto8' => '11', 'correcta8' => false],
                ['texto8' => '12', 'correcta8' => true],
            ],
        ],
    ]);
    }
}
