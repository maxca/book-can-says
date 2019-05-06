<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Http\Controllers\Controller;

/**
 * Class FacebookLoginController
 * @package App\Http\Controllers\Auth
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class GoogleLoginController extends Controller
{
    /**
     * Redirect the user to the google authentication page.
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        dump($user);
    }
}