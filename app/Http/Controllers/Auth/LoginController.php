<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $socialUser = Socialite::driver('facebook')->user();
        //dd($socialUser);
        $type = 'facebook';
        $user = $this->createOrGetUser($socialUser, $type);
        Auth::login($user);
        return redirect()->route('home');
    }

    public function createOrGetUser($socialUser, $type)
    {
        $user = User::where('social_id', $socialUser->id)->first();

        if ($user) {
            return $user;

        } else {
            if ($socialUser->email) {
                $email = $socialUser->email;
            } else {
                $email = $socialUser->id . '@' . $type . '.com';
            }
            $user = new User();
            $user->name = $socialUser->name;
            $user->password = Hash::make($socialUser->id . 'laravel');
            $user->email = $email;
            $user->social_id = $socialUser->id;
            $user->save();
            return $user;
        }
    }
}
