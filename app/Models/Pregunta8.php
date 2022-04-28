<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta8 extends Model
{
    use HasFactory;

    public function respuestas8()
    {
        return $this->hasMany(Respuesta8::class);
    }
}
