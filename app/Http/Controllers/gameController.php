<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class gameController extends Controller
{
    public function suma(){

        return view('games.suma');

    }

    public function resta(){

        return view('games.resta');
    }

    public function multi(){

        return view('games.multi');

    }

    public function division(){

        return view('games.division');

    }
}