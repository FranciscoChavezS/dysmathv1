<?php

use App\Conversations\ExamenConversation;
use App\Conversations\ExamenConversation8;
use App\Conversations\ExamenConversation9;
use BotMan\BotMan\BotMan;
use App\Conversations\QuizConversation;
use App\Http\Controllers\BotManController;



$botman = resolve('botman');

/* //El primer parametro "hola bot" será el que active nuestro bot, llamará a la función
//index de nuestro controlador chatController.php y ésta a la función hello
$botman->hears('Hola bot', 'App\Http\Controllers\BotManController@index'); */

$botman->fallback('App\Http\Controllers\FailChatController@index');
//Si lo que envia el usuario no lo conocemos, se ejecuta la función index del
//controlador FailChatController

$botman->hears('start', function (BotMan $bot) {
    $bot->startConversation(new QuizConversation());
});

$botman->hears('siete', function (BotMan $bot) {
    $bot->startConversation(new ExamenConversation());
});

$botman->hears('ocho', function (BotMan $bot) {
    $bot->startConversation(new ExamenConversation8());
});

$botman->hears('nueve', function (BotMan $bot) {
    $bot->startConversation(new ExamenConversation9());
});