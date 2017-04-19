<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $providerUser = Socialite::driver($provider)->stateless()->user();
        $email = $providerUser->getEmail() ?: '';
        $user = User::where('email', $email)->first();
        if (!$user) {
            $user = User::create([
                'email' => $email,
                'name' => $providerUser->getName(),
                'password' => uniqid(rand(), true),
                'avatar' => $providerUser->getAvatar(),
            ]);
        }

        auth()->login($user);
        if ($user->email != '') {
            return redirect()->action('HomeController@index');
        }

        return redirect()->action('HomeController@showUpdateEmailForm');
    }
}
