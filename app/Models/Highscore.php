<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use BotMan\BotMan\Interfaces\UserInterface;

class Highscore extends Model
{
    use HasFactory;

    protected $fillable = ['chat_id', 'name', 'points', 'correct_answers', 'tries'];

    protected $table = 'highscore';

    public static function saveUser(UserInterface $botUser, int $userPoints, int $userCorrectAnswers)
    {
        $user = static::updateOrCreate(['chat_id' => $botUser->getId()], [
            'chat_id' => $botUser->getId(),
            'name' => $botUser->getFirstName().' '.$botUser->getLastName(),
            'points' => $userPoints,
            'correct_answers' => $userCorrectAnswers,
        ]);

        $user->increment('tries');

        $user->save();

        return $user;
    }

    public function getRank()
    {
        return static::query()->where('points', '>', $this->points)->pluck('points')->unique()->count() + 1;
    }

    public static function topUsers($size = 10)
    {
        return static::query()->orderByDesc('points')->take($size)->get();
    }

    public static function deleteUser(string $chatId)
    {
        Highscore::where('chat_id', $chatId)->delete();
    } 
}
