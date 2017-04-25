<?php

namespace App\Http\Controllers;

	use App\User;
	use App\Http\Controllers\Controller;
	use Socialite;

	class AuthController extends Controller
	{
	    public function redirectToProvider()
	    {
	      return Socialite::driver('github')->redirect();
	    }

	    public function handleProviderCallback()
	    {
	$githubuser = Socialite::driver('github')->user();

	//dd($githubuser);
	        
	    }
	}