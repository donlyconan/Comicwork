<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\RoleUser;
use App\Model\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function callback($provider)
    {
        $userinfo = Socialite::driver($provider)->stateless()->user();

        $user = User::whereEmail($userinfo->email)->first();

        if ($user == null) {
            $user = new User();
            $user->username = \Str::random(100);
            $user->email = $userinfo->email;
            $user->full_name = $userinfo->name;
            $user->url_image = $userinfo->avatar;
            $user->status = User::STT_SOCIAL;
            $user->save();

            RoleUser::insert(['id_user' => $user->id, 'id_role' => 1]);
        }

        Auth::login($user);
        LoginController::createToken(Auth::user());
        return redirect()->route('homepage');
    }
}
