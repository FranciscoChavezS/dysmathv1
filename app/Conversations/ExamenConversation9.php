<?php

namespace App\Conversations;

use App\Models\Respuesta9;
use App\Models\Pregunta9;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer as BotManAnswer;
use BotMan\BotMan\Messages\Outgoing\Question as BotManQuestion;


class ExamenConversation9 extends Conversation
{
    /** @var Pregunta9 */
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
        $this->quizQuestions = Pregunta9::all()
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
    private function askQuestion(Pregunta9 $pregunta9)
    {
        $this->ask($this->createQuestionTemplate($pregunta9), function (BotManAnswer $respuesta9) use ($pregunta9) {
            $quizAnswer = Respuesta9::find($respuesta9->getValue());

            if (! $quizAnswer) {
                $this->say('Lo siento, no entendí eso. Utilice los botones.');
                return $this->checkForNextQuestion();
            }

            $this->quizQuestions->forget($pregunta9->id);

            if ($quizAnswer->correcta9) {
                $this->userPoints += $pregunta9->puntos9;
                $this->userCorrectAnswers++;
                $answerResult = '✅';
            } else {
                $correctAnswer = $pregunta9->respuestas9()->where('correcta9', true)->first()->texto9;
                $answerResult = "❌ (Correcta: {$correctAnswer})";
            }
            $this->currentQuestion++;

            $this->say("Tu respuesta: {$quizAnswer->texto9} {$answerResult}");
            $this->checkForNextQuestion();
        });
    }

    private function createQuestionTemplate(Pregunta9 $pregunta9)
    {
        $questionText = '➡️ Pregunta: '.$this->currentQuestion.' / '.$this->questionCount.' : '.$pregunta9->texto9;
        $questionTemplate = BotManQuestion::create($questionText);
        $respuestas9 = $pregunta9->respuestas9->shuffle();

        foreach ($respuestas9 as $respuesta9) {
            $questionTemplate->addButton(Button::create($respuesta9->texto9)->value($respuesta9->id));
        }

        return $questionTemplate;
    }

    private function showResult()
    {
        $this->say('Finalizado 🏁');
        $this->say("Has superado todas las preguntas. Alcanzaste {$this->userPoints} Puntos! Respuestas correctas: {$this->userCorrectAnswers} / {$this->questionCount}");
        
        if($this->userPoints == '16'){
            $this->say("🟩TIENE UN GRADO DE DISCALCULIA BAJO 🟩");
        }else if($this->userPoints == '9' OR $this->userPoints == '10' OR $this->userPoints == '11' OR $this->userPoints == '12' OR $this->userPoints == '13' OR $this->userPoints == '14' OR $this->userPoints == '15'){
            $this->say("🟨TIENE UN GRADO DE DISCALCULIA MEDIO🟨");
        }else{
            $this->say("🟥TIENE UN GRADO DE DISCALCULIA GRAVE🟥");
        }
    } 

}