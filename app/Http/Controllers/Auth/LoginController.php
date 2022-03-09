<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\SocialProfile;


class LoginController extends Controller
{
    public function login($driver)
    {
        return Socialite::driver($driver)->redirect();
    }
 
    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function callback($driver)
    {
        $userSocialite = Socialite::driver($driver)->user();

        $user = User::where('email', $userSocialite->getEmail())->first();

        if(!$user){
            $user = User::create([
                'name' => $userSocialite->getName(),
                'email' => $userSocialite->getEmail(),
            ]);
        }

        $social_profile = SocialProfile::where('social_id', $userSocialite->getId())
                                        ->where('social_name', $driver)->first();
        
        if(!$social_profile){
            SocialProfile::create([
                'user_id' => $user->id,
                'social_id' => $userSocialite->getId(),
                'social_name' => $driver,
                'social_avatar' => $userSocialite->getAvatar()
            ]);
        }

        auth()->login($user);

        return redirect()->route('home');

        
        // $user->token;
    }
}
