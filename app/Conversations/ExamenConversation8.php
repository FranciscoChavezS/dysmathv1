<?php

namespace App\Conversations;

use App\Models\Respuesta8;
use App\Models\Pregunta8;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer as BotManAnswer;
use BotMan\BotMan\Messages\Outgoing\Question as BotManQuestion;


class ExamenConversation8 extends Conversation
{
    /** @var Pregunta8 */
    protected $quizQuestions;

    /** @var integer */
    protected $userPoints = 0;

    /** @var integer */
    protected $userCorrectAnswers = 0;

    /** @var integer */
    protected $questionCount = 0; // we already had this one

    /** @var integer */
    protected $currentQuestion = 1;

    public function run()
    {
        $this->quizQuestions = Pregunta8::all()
            ->shuffle();
        $this->questionCount = $this->quizQuestions->count();
        $this->quizQuestions = $this->quizQuestions->keyBy('id');
        $this->showInfo();
    }

    private function showInfo()
    {
        $this->say('Se le mostrará '.$this->questionCount.' preguntas');
        $this->checkForNextQuestion();
    }

    private function checkForNextQuestion()
    {
        if ($this->quizQuestions->count()) {
            return $this->askQuestion($this->quizQuestions->first());
        }

        $this->showResult();
    }
    private function askQuestion(Pregunta8 $pregunta8)
    {
        $this->ask($this->createQuestionTemplate($pregunta8), function (BotManAnswer $respuesta8) use ($pregunta8) {
            $quizAnswer = Respuesta8::find($respuesta8->getValue());

            if (! $quizAnswer) {
                $this->say('Lo siento, no entendí eso. Utilice los botones.');
                return $this->checkForNextQuestion();
            }

            $this->quizQuestions->forget($pregunta8->id);

            if ($quizAnswer->correcta8) {
                $this->userPoints += $pregunta8->puntos8;
                $this->userCorrectAnswers++;
                $answerResult = '✅';
            } else {
                $correctAnswer = $pregunta8->respuestas8()->where('correcta8', true)->first()->texto8;
                $answerResult = "❌ (Correcta: {$correctAnswer})";
            }
            $this->currentQuestion++;

            $this->say("Tu respuesta: {$quizAnswer->texto8} {$answerResult}");
            $this->checkForNextQuestion();
        });
    }

    private function createQuestionTemplate(Pregunta8 $pregunta8)
    {
        $questionText = '➡️ Pregunta: '.$this->currentQuestion.' / '.$this->questionCount.' : '.$pregunta8->texto8;
        $questionTemplate = BotManQuestion::create($questionText);
        $respuestas8 = $pregunta8->respuestas8->shuffle();

        foreach ($respuestas8 as $respuesta8) {
            $questionTemplate->addButton(Button::create($respuesta8->texto8)->value($respuesta8->id));
        }

        return $questionTemplate;
    }

    private function showResult()
    {
        $this->say('Finalizado 🏁');
        $this->say("Has superado todas las preguntas. Alcanzaste {$this->userPoints} Puntos! Respuestas correctas: {$this->userCorrectAnswers} / {$this->questionCount}");
    } 

}