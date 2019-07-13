<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request,$username)
    {
        $user = User::firstOrCreate(['username' => $username]);
        $request->session()->put('user', $user);

        return view('chat');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');

        return redirect()->route('welcome')
            ->with('status', "You've successfully logged out");
    }
}
