<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Attachments\Image;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Incoming\Answer as BotManAnswer;
use BotMan\BotMan\Messages\Outgoing\Question as BotManQuestion;
use App\Conversations\QuizConversation;
use App\Conversations\ExamenConversation;

class BotConversation extends Conversation
{
    /**
     * First question
     */
    public function hello()
    {
        $question = Question::create("¡Hola! ¿Cuál es tu edad?") //Saludamos al usuario
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('6')->value('seis'),//Primera opcion, esta tendra el value seis
                Button::create('7')->value('siete'), //Segunda opcion, esta tendra el value info
                Button::create('8')->value('ocho'),
                Button::create('9')->value('nueve'),
            ]);
        //Cuando el usuario elija la respuesta, se enviará el value aquí:
        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'seis') {//Si es el value seis, contestará con este mensaje
                    $this->getBot()->startConversation(new QuizConversation());
                    //Si es el value info, llamaremos a la funcion options
                } else if ($answer->getValue() === 'siete'){
                    $this->getBot()->startConversation(new ExamenConversation());
                } else if ($answer->getValue() === 'quiz'){
                    $this->options();
                }
            }
        });
    }

    public function seis(){
        $question = Question::create("Cuenta estos perritos con tu dedo 🐶🐕🐩🦮🐕‍🦺 ¿Cuántos perritos has contado?")
        //le preguntamos al usuario que quiere saber
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('5')->value('1'),//
                Button::create('3')->value('2'),//
                Button::create('6')->value('3'),//

            ]);

            return $this->ask($question, function (Answer $answer) {
                if ($answer->isInteractiveMessageReply()) {
                    if ($answer->getValue() === '1') {//Le muestra la hora la usuario si el value es hour
                        $this->say('bien');
                    }else if ($answer->getValue() === 'day'){//Le muestra la hora la usuario si el value es date
                        $today = date("d/m/Y");
                        $this->say('Hoy es : '.$today);
                    }
                }
            });
    }

   

    public function options(){
        $question = Question::create("¿Qué quieres saber?")//le preguntamos al usuario que quiere saber
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('¿Qué hora es?')->value('hour'),//Opción de hora, con value hour
                Button::create('¿Qué día es hoy?')->value('day'),//Opción de fecha, con value day
            ]);

            return $this->ask($question, function (Answer $answer) {
                if ($answer->isInteractiveMessageReply()) {
                    if ($answer->getValue() === 'hour') {//Le muestra la hora la usuario si el value es hour
                        $hour = date('H:i');
                        $this->say('Son las '.$hour);
                    }else if ($answer->getValue() === 'day'){//Le muestra la hora la usuario si el value es date
                        $today = date("d/m/Y");
                        $this->say('Hoy es : '.$today);
                    }
                }
            });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->hello();
    }
}