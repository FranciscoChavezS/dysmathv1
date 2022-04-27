<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Respuesta;

class Pregunta extends Model
{
    use HasFactory;

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
}
