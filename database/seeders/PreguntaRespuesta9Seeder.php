<?php

namespace Database\Seeders;

use App\Models\Pregunta9;
use App\Models\Respuesta9;
use Illuminate\Database\Seeder;

class PreguntaRespuesta9Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta9::truncate();
        Respuesta9::truncate();
        $preguntaYRespuesta9 = $this->obtenerDatos9();

        $preguntaYRespuesta9->each(function ($pregunta9) {
            $crearPregunta9 = Pregunta9::create([
                'texto9' => $pregunta9['pregunta9'],
                'puntos9' => $pregunta9['puntos9'],
            ]);

            collect($pregunta9['respuesta9'])->each(function ($respuesta9) use ($crearPregunta9) {
                Respuesta9::create([
                    'pregunta9_id' => $crearPregunta9->id,
                    'texto9' => $respuesta9['texto9'],
                    'correcta9' => $respuesta9['correcta9'],
                ]);
            });
        });
    }
    private function obtenerDatos9()
    {
    return collect([
        [
            'pregunta9' => 'Si corto una manzana por la mitad, ¿cuántos pedazos tendré?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '5', 'correcta9' => false],
                ['texto9' => '3', 'correcta9' => false],
                ['texto9' => '2', 'correcta9' => true],
            ],
        ],
        [
            'pregunta9' => 'José tiene 9 galletas. Le da 1 a Samuel y 1 a Jimena. ¿Cuántas galletas le quedan?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '8', 'correcta9' => false],
                ['texto9' => '6', 'correcta9' => false],
                ['texto9' => '7', 'correcta9' => true],
            ],
        ],
        [
            'pregunta9' => 'Si tienes 3 lápices en cada mano, ¿cuántos lápices tienes en total?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '12', 'correcta9' => false],
                ['texto9' => '7', 'correcta9' => false],
                ['texto9' => '6', 'correcta9' => true],
            ],
        ],
        [
            'pregunta9' => 'Laura tiene 8 manzanas y Pedro 4. Si juntan las manzanas de ambos. ¿Cuántas manzanas tienen en total?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '4', 'correcta9' => false],
                ['texto9' => '10', 'correcta9' => false],
                ['texto9' => '12', 'correcta9' => true],
            ],
        ],
        [
            'pregunta9' => 'En la una cancha hay 6 balones de fútbol y 5 de basquetbol. ¿Cuántos balones hay en total?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '12', 'correcta9' => false],
                ['texto9' => '10', 'correcta9' => false],
                ['texto9' => '11', 'correcta9' => true],
            ],
        ],
        [
            'pregunta9' => 'Si tengo 10 peras, yo me como 2 y mi amigo Luis 3. ¿Cuántas peras me quedan?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '0', 'correcta9' => false],
                ['texto9' => '10', 'correcta9' => false],
                ['texto9' => '5', 'correcta9' => true],
            ],
        ],
        [
            'pregunta9' => 'En mi jardín hay 9 rosas, 5 tulipanes y 8 margaritas. ¿Cuántos flores tengo el total?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '20', 'correcta9' => false],
                ['texto9' => '21', 'correcta9' => false],
                ['texto9' => '22', 'correcta9' => true],
            ],
        ],
        [
            'pregunta9' => 'Mario tiene 12 dulces, le regaló 4 a su mamá, 2 a su hermana y 3 a su papá. ¿Cuántos dulces le quedan?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '6', 'correcta9' => false],
                ['texto9' => '2', 'correcta9' => false],
                ['texto9' => '3', 'correcta9' => true],
            ],
        ],
        [
            'pregunta9' => 'Martha tiene una canasta con 10 manzanas, 4 peras y 6 naranjas. Fue a la frutería y compró 4 manzanas, 5 peras y 3 naranjas. ¿Cuánta fruta tiene en total?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '29', 'correcta9' => false],
                ['texto9' => '31', 'correcta9' => false],
                ['texto9' => '32', 'correcta9' => true],
            ],
        ],
        [
            'pregunta9' => 'Tengo 12 canicas y me gané 5 más. ¿Cuántas canicas tengo en total?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '20', 'correcta9' => false],
                ['texto9' => '18', 'correcta9' => false],
                ['texto9' => '17', 'correcta9' => true],
            ],
        ],
        [
            'pregunta9' => 'En un estacionamiento hay 13 autos rojos, 9 azules y 10 negros. ¿Cuántos autos hay en total en el estacionamiento?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '30', 'correcta9' => false],
                ['texto9' => '34', 'correcta9' => false],
                ['texto9' => '32', 'correcta9' => true],
            ],
        ],
        [
            'pregunta9' => 'Carmen horneo 13 pasteles y ha vendido 6. ¿Cuántos pasteles le quedan?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '8', 'correcta9' => false],
                ['texto9' => '9', 'correcta9' => false],
                ['texto9' => '7', 'correcta9' => true],
            ],
        ],
        [
            'pregunta9' => 'Luisa tenía 12 pelotas y compró 3. ¿Cuántas pelotas tiene en total?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '17', 'correcta9' => false],
                ['texto9' => '16', 'correcta9' => false],
                ['texto9' => '15', 'correcta9' => true],
            ],
        ],
        [
            'pregunta9' => 'Tenía 15 colores y se me perdieron 8. ¿Cuántos colores me quedan?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '8', 'correcta9' => false],
                ['texto9' => '10', 'correcta9' => false],
                ['texto9' => '7', 'correcta9' => true],
            ],
        ],
        [
            'pregunta9' => ' En una veterinaria hay 13 perros y 9 gatos. ¿Cuántos animales hay en total?',
            'puntos9' => '1',
            'respuesta9' => [
                ['texto9' => '20', 'correcta9' => false],
                ['texto9' => '21', 'correcta9' => false],
                ['texto9' => '22', 'correcta9' => true],
            ],
        ],
    ]);
    }
}
