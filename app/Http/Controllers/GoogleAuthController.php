<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    //This function to redirect user to the google sign in page
    public function redirect() 
    {
        return Socialite::driver('google')->redirect();
    }

    // This function is responsible to handel the call-back url of google authentication
    public function callbackGoogle() 
    {
        try{

            $google_user = Socialite::driver('google')->user();
            // $google_user->getEmail()->first();

            //check if the user in the database or not
            $user = User::where('email', $google_user->getEmail())->first();

            //If user doesn't exists in the database -> create new user
            if(!$user){

                $new_user = User::create([
                    'from_google' => 'yes',
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    
                ]);



                Auth::login($new_user);

                return redirect()->intended('/');

            }
            //If user exists in the database
            else{

                Auth::login($user);

                return redirect()->intended('/');

            }

        } catch(Exception $th){

            dd('Something went wrong! ' . $th->getMessage());

        }
    }
}
