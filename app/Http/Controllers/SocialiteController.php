<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function handleGoogleCallback()
    {
        $googleuser = Socialite::driver('google')->user();
        $user = User::where('provider_id', $googleuser->getId())
                    ->orWhere('email', $googleuser->getEmail())
                    ->first();
                    
        if($user == null){
            $user = User::create([
                'email'         => $googleuser->getEmail(),
                'name'          => $googleuser->getName(),
                'avatar'        => $googleuser->getAvatar(),
                'provider_id'   => $googleuser->getId(),
            ]);
        }

        Auth::login($user, true);

        return redirect('/dashboard');        
    }
}
