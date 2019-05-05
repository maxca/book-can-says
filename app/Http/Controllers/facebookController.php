<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class facebookController extends Controller
{

    public function facebookLogin()
    {
//        $fb = new \Facebook\Facebook(['app_id' => '331320044239774',
//            'app_secret' => '0abfb0db9dfdba067cd4cc9e309ed2d7',
//            'default_graph_version' => 'v2.10', //'default_access_token' => '{access-token}', // optional
//        ]);

        session_start();

        $provider = new \League\OAuth2\Client\Provider\Facebook([
            'clientId' => '331320044239774',
            'clientSecret' => '0abfb0db9dfdba067cd4cc9e309ed2d7',
            'redirectUri' => url('/callback-url'),
            'graphApiVersion' => 'v2.10',
        ]);

        if (!isset($_GET['code'])) {

            // If we don't have an authorization code then get one
            $authUrl = $provider->getAuthorizationUrl([
                'scope' => ['email', '...', '...'],
            ]);
            $_SESSION['oauth2state'] = $provider->getState();

            echo '<a href="' . $authUrl . '">Log in with Facebook!</a>';
            exit;

// Check given state against previously stored one to mitigate CSRF attack
        } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

            unset($_SESSION['oauth2state']);
            echo 'Invalid state.';
            exit;

        }

// Try to get an access token (using the authorization code grant)
        $token = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);

// Optional: Now you have a token you can look up a users profile data
        try {

            // We got an access token, let's now get the user's details
            $user = $provider->getResourceOwner($token);

            // Use these details to create a new profile
            printf('Hello %s!', $user->getFirstName());

            echo '<pre>';
            var_dump($user);
            # object(League\OAuth2\Client\Provider\FacebookUser)#10 (1) { ...
            echo '</pre>';

        } catch (\Exception $e) {

            // Failed to get user details
            exit('Oh dear...');
        }

        echo '<pre>';
// Use this to interact with an API on the users behalf
        var_dump($token->getToken());
# string(217) "CAADAppfn3msBAI7tZBLWg...

// The time (in epoch time) when an access token will expire
        var_dump($token->getExpires());
# int(1436825866)
        echo '</pre>';


    }

    public function callBack() {

    }


}
