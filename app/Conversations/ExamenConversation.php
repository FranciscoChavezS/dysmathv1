<?php

namespace App\Conversations;

use App\Models\Respuesta;
use App\Models\Pregunta;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer as BotManAnswer;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question as BotManQuestion;


class ExamenConversation extends Conversation
{
    /** @var Pregunta */
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
        $this->quizQuestions = Pregunta::all()
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
    private function askQuestion(Pregunta $pregunta)
    {
        $this->ask($this->createQuestionTemplate($pregunta), function (BotManAnswer $respuesta) use ($pregunta) {
            $quizAnswer = Respuesta::find($respuesta->getValue());

            if (! $quizAnswer) {
                $this->say('Lo siento, no entendí eso. Utilice los botones.');
                return $this->checkForNextQuestion();
            }

            $this->quizQuestions->forget($pregunta->id);

            if ($quizAnswer->correcta) {
                $this->userPoints += $pregunta->puntos;
                $this->userCorrectAnswers++;
                $answerResult = '✅';
            } else {
                $correctAnswer = $pregunta->respuestas()->where('correcta', true)->first()->texto;
                $answerResult = "❌ (Correcta: {$correctAnswer})";
            }
            $this->currentQuestion++;

            $this->say("Tu respuesta: {$quizAnswer->texto} {$answerResult}");
            $this->checkForNextQuestion();
        });
    }

    private function createQuestionTemplate(Pregunta $pregunta)
    {
        $questionText = '➡️ Pregunta: '.$this->currentQuestion.' / '.$this->questionCount.' : '.$pregunta->texto;
        $attachament = new Image($pregunta->imagen);
        $response=OutgoingMessage::create('')->withAttachment($attachament);
        $this->say($response);
        $questionTemplate = BotManQuestion::create($questionText);
        $respuestas = $pregunta->respuestas->shuffle();

        foreach ($respuestas as $respuesta) {
            $questionTemplate->addButton(Button::create($respuesta->texto)->value($respuesta->id));
        }

        return $questionTemplate;
    }

    private function showResult()
    {
        $this->say('Finalizado 🏁');
        $this->say("Alcanzaste {$this->userPoints} Puntos! Respuestas correctas: {$this->userCorrectAnswers} / {$this->questionCount}");

        if($this->userPoints == '10' OR $this->userPoints == '11'){
            $this->say("🟩TIENE UN GRADO DE DISCALCULIA BAJO 🟩");
        }else if($this->userPoints == '6' OR $this->userPoints == '7' OR $this->userPoints == '8' OR $this->userPoints == '9' ){
            $this->say("🟨TIENE UN GRADO DE DISCALCULIA MEDIO🟨");
        }else{
            $this->say("🟥TIENE UN GRADO DE DISCALCULIA GRAVE🟥");
        }
    } 

}