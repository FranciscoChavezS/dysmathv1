<?php

namespace App\Conversations;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Question;
use App\Models\Highscore;
use App\Models\Level;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer as BotManAnswer;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question as BotManQuestion;


class QuizConversation extends Conversation
{

    /** @var Question */
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
        $this->quizQuestions = Question::all()
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
    private function askQuestion(Question $question)
    {
        $this->ask($this->createQuestionTemplate($question), function (BotManAnswer $answer) use ($question) {
            $quizAnswer = Answer::find($answer->getValue());

            if (! $quizAnswer) {
                $this->say('Lo siento, no entendí eso. Utilice los botones.');
                return $this->checkForNextQuestion();
            }

            $this->quizQuestions->forget($question->id);

            if ($quizAnswer->correct_one) {
                $this->userPoints += $question->points;
                $this->userCorrectAnswers++;
                $answerResult = '✅';
            } else {
                $correctAnswer = $question->answers()->where('correct_one', true)->first()->text;
                $answerResult = "❌ (Correcta: {$correctAnswer})";
            }
            $this->currentQuestion++;

            $this->say("Tu respuesta: {$quizAnswer->text} {$answerResult}");
            $this->checkForNextQuestion();
        });
    }

    private function createQuestionTemplate(Question $question)
    {
        $questionText = '➡️ Pregunta: '.$this->currentQuestion.' / '.$this->questionCount.' : '.$question->text;
        $attachament = new Image($question->imagen);
        $response=OutgoingMessage::create('')->withAttachment($attachament);
        $this->say($response);
        $questionTemplate = BotManQuestion::create($questionText);
        $answers = $question->answers->shuffle();

        foreach ($answers as $answer) {
            $questionTemplate->addButton(Button::create($answer->text)->value($answer->id));
        }

        return $questionTemplate;
    }


    private function showResult()
    {
        $this->say('Finalizado 🏁');
        $this->say("Alcanzaste {$this->userPoints} Puntos! Respuestas correctas: {$this->userCorrectAnswers} / {$this->questionCount}");

        $course = Level::all();
        
        if($this->userPoints == '9' OR $this->userPoints == '8'){
            $this->say("🟩TIENE UN GRADO DE DISCALCULIA BAJO 🟩");
        }else if($this->userPoints == '5' OR $this->userPoints == '6' OR $this->userPoints == '7' ){
            $this->say("🟨TIENE UN GRADO DE DISCALCULIA MEDIO🟨");
        }else{
            $this->say("🟥TIENE UN GRADO DE DISCALCULIA GRAVE🟥");
        }

    }

    
}