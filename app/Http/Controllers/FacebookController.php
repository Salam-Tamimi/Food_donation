<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use Exception;

class FacebookController extends Controller
{
    //This function to redirect user to the facebook sign in page
    public function facebookPage() 
    {
        //getting the facebook user id throw socialite
        return Socialite::driver('facebook')->redirect();
    }

    // This function is responsible to handel the call-back url of facebook authentication
    public function facebookredirect() 
    {
        try{

            $user = Socialite::driver('facebook')->user();

            //check if the user in the database or not
            $finduser = User::where('facebook_id', $user->getId())->first();

            //If user doesn't exists in the database -> create new user
            if(!$finduser){

                $new_user = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'facebook_id' => $user->getId()
                ]);

                Auth::login($new_user);

                return redirect()->intended('/');

            }
            
            //If user exists in the database
            else{

                Auth::login($finduser);

                return redirect()->intended('/');

            }

        } catch(Exception $e){

            dd('Something went wrong! ' . $e->getMessage());

        }
    }
}
