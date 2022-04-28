<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta9 extends Model
{
    use HasFactory;

    public function respuestas9()
    {
        return $this->hasMany(Respuesta9::class);
    }
}
