<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::truncate();
        Answer::truncate();
        $questionAndAnswers = $this->getData();

        $questionAndAnswers->each(function ($question) {
            $createdQuestion = Question::create([
                'text' => $question['question'],
                'points' => $question['points'],
                'imagen' => $question['imagen'],
            ]);

            collect($question['answers'])->each(function ($answer) use ($createdQuestion) {
                Answer::create([
                    'question_id' => $createdQuestion->id,
                    'text' => $answer['text'],
                    'correct_one' => $answer['correct_one'],
                ]);
            });
        });
    }

    private function getData()
    {
    return collect([
        [
            'question' => 'Cuenta estos perritos con tu dedo. ¿Cuántos perritos has contado?',
            'points' => '1',
            'imagen' => 'https://i.ibb.co/s35SY43/dibujos-animados-perros-pie-52569-132.jpg',
            'answers' => [
                ['text' => '6', 'correct_one' => false],
                ['text' => '4', 'correct_one' => false],
                ['text' => '5', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos pollitos con tu dedo. ¿Cuántos pollitos has contado?',
            'points' => '1',
            'imagen' => 'https://i.ibb.co/XpZtFVF/Pregunta-1-6-a-os.jpg',
            'answers' => [
                ['text' => '3', 'correct_one' => false],
                ['text' => '4', 'correct_one' => false],
                ['text' => '5', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos árboles con tu dedo. ¿Cuántos árboles has contado?',
            'points' => '1',
            'imagen' => 'https://i.ibb.co/8NcR6FW/Pregunta-3-6-a-os.jpg',
            'answers' => [
                ['text' => '2', 'correct_one' => false],
                ['text' => '5', 'correct_one' => false],
                ['text' => '4', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos dulces con tu dedo. ¿Cuántos dulces has contado?',
            'points' => '1',
            'imagen' => 'https://i.ibb.co/VTFvfB1/Pregunta-4-6-a-os.webp',
            'answers' => [
                ['text' => '8', 'correct_one' => false],
                ['text' => '7', 'correct_one' => false],
                ['text' => '9', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos helados con tu dedo. ¿Cuántos helados has contado?',
            'points' => '1',
            'imagen' => 'https://i.ibb.co/ZgLL4fL/Pregunta-5-6-a-os.jpg',
            'answers' => [
                ['text' => '7', 'correct_one' => false],
                ['text' => '10', 'correct_one' => false],
                ['text' => '8', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos lápices con tu dedo. ¿Cuántos lápices has contado?',
            'points' => '1',
            'imagen' => 'https://i.ibb.co/Rvx00kY/Pregunta-6-6-a-os.webp',
            'answers' => [
                ['text' => '3', 'correct_one' => false],
                ['text' => '4', 'correct_one' => false],
                ['text' => '5', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos osos de peluches con tu dedo. ¿Cuántos osos de peluches has contado?',
            'points' => '1',
            'imagen' => 'https://i.ibb.co/dKMtGDj/Pregunta-7-6a-os.jpg',
            'answers' => [
                ['text' => '5', 'correct_one' => false],
                ['text' => '3', 'correct_one' => false],
                ['text' => '4', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos manzanas con tu dedo. ¿Cuántos manzanas has contado?',
            'points' => '1',
            'imagen' => 'https://i.ibb.co/ZmF8y6M/Pregunta-8-6a-os.png',
            'answers' => [
                ['text' => '12', 'correct_one' => false],
                ['text' => '11', 'correct_one' => false],
                ['text' => '10', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos pelotas con tu dedo. ¿Cuántos pelotas has contado?',
            'points' => '1',
            'imagen' => 'https://i.ibb.co/HHVYgjP/Pregunta-9-6a-os.jpg',
            'answers' => [
                ['text' => '11', 'correct_one' => false],
                ['text' => '10', 'correct_one' => false],
                ['text' => '9', 'correct_one' => true],
            ],
        ],
    ]);
    }
}
