<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    public function login()
    {
        return Socialite::driver('facebook')->redirect();
    }
 
    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function callback()
    {
        $user = Socialite::driver('facebook')->user();

        return $user->getName();
        // $user->token;
    }
}
