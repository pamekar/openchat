<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Login to application
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $username= $request->input('username');
        $user = User::firstOrCreate(['username' => $username]);

        // Set cookie
        Cookie::queue('user_id', $user->id, config('app.cookieAge'), '', '',
            false, false);
        Cookie::queue('username', $user->username, config('app.cookieAge'), '', '',
            false, false);
        return redirect()->route('users.show',['id'=>$user->id]);
    }

    /**
     * Logout from application 
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request){
        // Expire cookie
        Cookie::queue('user_id', "", -config('app.cookieAge'), '', '',
            false, false);
        Cookie::queue('username', "", -config('app.cookieAge'), '', '',
            false, false);
        return redirect()->route('welcome');

    }
}
