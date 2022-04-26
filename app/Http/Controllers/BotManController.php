<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Conversations\BotConversation;

class BotManController extends Controller
{
    protected $questionCount = 0;
    
    public function handle(){

        $botman = app('botman');

        $botman->hears('{message}' , function($botman, $message){
            if($message == 'Hola bot' OR $message == 'Que tal' OR $message == 'hola' OR $message == 'Hola'){
                $this->index($botman);
            }else{
                $botman->reply("Soy un chatbot, te ayudo a navegar por esta aplicación, solo debes escribir 'Hola bot'");
            }
        });  
        
        $botman->listen();
    }


    public function index($bot){
        $bot->startConversation(new BotConversation);
    }

    public function askName($botman)
    {
        $botman->ask('Hola! ¿Cuál es tu nombre?', function(Answer $answer) {
  
            $name = $answer->getText();
  
            $this->say('Encantado de Conocerte '.$name);
        });
    }

}
