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
            'question' => 'Cuenta estos perritos con tu dedo 🐶🐶🐶🐶🐶. ¿Cuántos perritos has contado?',
            'points' => '1',
            'answers' => [
                ['text' => '6', 'correct_one' => false],
                ['text' => '4', 'correct_one' => false],
                ['text' => '5', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos pollitos con tu dedo 🐥🐥🐥🐥🐥. ¿Cuántos pollitos has contado?',
            'points' => '1',
            'answers' => [
                ['text' => '3', 'correct_one' => false],
                ['text' => '4', 'correct_one' => false],
                ['text' => '5', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos árboles con tu dedo 🌳🌳🌳🌳. ¿Cuántos árboles has contado?',
            'points' => '1',
            'answers' => [
                ['text' => '2', 'correct_one' => false],
                ['text' => '5', 'correct_one' => false],
                ['text' => '4', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos dulces con tu dedo 🍬🍭🍫🍬🍭🍫🍬🍭🍫. ¿Cuántos dulces has contado?',
            'points' => '1',
            'answers' => [
                ['text' => '8', 'correct_one' => false],
                ['text' => '7', 'correct_one' => false],
                ['text' => '9', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos helados con tu dedo 🍨🍦🍨🍦🍨🍦🍨🍦. ¿Cuántos helados has contado?',
            'points' => '1',
            'answers' => [
                ['text' => '7', 'correct_one' => false],
                ['text' => '10', 'correct_one' => false],
                ['text' => '8', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos carros con tu dedo 🚗🚙🚕🚑🚓. ¿Cuántos carros has contado?',
            'points' => '1',
            'answers' => [
                ['text' => '3', 'correct_one' => false],
                ['text' => '4', 'correct_one' => false],
                ['text' => '5', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos osos de peluches con tu dedo 🧸🧸🧸🧸. ¿Cuántos osos de peluches has contado?',
            'points' => '1',
            'answers' => [
                ['text' => '5', 'correct_one' => false],
                ['text' => '3', 'correct_one' => false],
                ['text' => '4', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos manzanas con tu dedo 🍎🍎🍎🍎🍎🍎🍎🍎🍎🍎. ¿Cuántos manzanas has contado?',
            'points' => '1',
            'answers' => [
                ['text' => '12', 'correct_one' => false],
                ['text' => '11', 'correct_one' => false],
                ['text' => '10', 'correct_one' => true],
            ],
        ],
        [
            'question' => 'Cuenta estos pelotas con tu dedo ⚽⚽⚽⚽⚽⚽⚽⚽⚽. ¿Cuántos pelotas has contado?',
            'points' => '1',
            'answers' => [
                ['text' => '11', 'correct_one' => false],
                ['text' => '10', 'correct_one' => false],
                ['text' => '9', 'correct_one' => true],
            ],
        ],
    ]);
    }
}
