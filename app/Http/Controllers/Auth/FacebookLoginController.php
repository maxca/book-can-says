<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Http\Controllers\Controller;
/**
 * Class FacebookLoginController
 * @package App\Http\Controllers\Auth
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class FacebookLoginController extends Controller
{
    /**
     * Redirect the user to the facebook authentication page.
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        dump($user);
    }
}