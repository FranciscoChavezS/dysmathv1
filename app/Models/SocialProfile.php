<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SocialProfile extends Model
{
    use HasFactory;

    public function user(){
        $this->belongsTo(User::class);
    }
}
