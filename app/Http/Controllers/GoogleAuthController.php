<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()

    {
        $user = Socialite::driver('google')->user();
        $existingUser = User::where('email', trim(strip_tags($user->email)))->first();
        if($existingUser){
            // log in the existing user
            Auth::login($existingUser, true);
            if($existingUser->google_id == null){
                $existingUser->google_id = $user->id;
                $existingUser->save();
            }
        } else {
            // create a new user
            $newUser = new User;
            $newUser->name = trim(strip_tags($user->name));
            $newUser->email = trim(strip_tags($user->email));
            $newUser->phone = trim(strip_tags($user->phone));
            $newUser->google_id = $user->id;
            $newUser->save();
            Auth::login($newUser, true);


        }
        if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff') {
            $message='Admin login have been successful';
                Toastr::success('success', $message);
            return redirect()->route('admin.index')->with('success', $message);

        }else {
            if (session('link') != null) {
                return redirect(session('link'));
            } else {
                $message='login successfully';
                Toastr::success('success', $message);
                return redirect()->intended('home')->with('success', $message);
            }
        }
    }

    // {
    //     try {

    //         $user=Socialite::driver('google')->user();
    //         $finduser=User::where('google_id',$user->id)->first();

    //         if (!$finduser) {
    //             Auth::login($finduser);

    //             return redirect()->intended('dashboard');
    //             // $new_user=User::create([
    //             //     'name'=> $google_user->getName(),
    //             //     'email'=>$google_user->getEmail(),
    //             //     'google_id'=>$google_user->getId()
    //             // ]);

    //             // Auth::login($new_user);

    //             // return redirect()->intended('dashboard');
    //         }
    //         else {
    //             $newUser = User::create([
    //                 'name' => $user->name,
    //                 'email' => $user->email,
    //                 'google_id'=> $user->id,
    //                 'password' => encrypt('123456dummy')
    //             ]);

    //             Auth::login($newUser);

    //             return redirect()->intended('dashboard');
    //         }
    //         //     Auth::login($user);
    //         //     return redirect()->intended('dashboard');
    //         // }
    //     } catch (\Throwable $th) {
    //         dd('something went wrong!'. $th->getMessage());
    //     }
    // }
}



