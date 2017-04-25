<?php

namespace App\Http\Controllers\Auth;

use Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
                 return User::create([
           'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => 'Google',
        ]);
          return view ('table');

        // $user->token;
    }
}