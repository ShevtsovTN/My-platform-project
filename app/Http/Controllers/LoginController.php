<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        Auth::attempt([
           'login' =>  $request->name,
            'password' => $request->password
        ]);
        UserController::online();
        return redirect()->route('users');
    }

    public function logout()
    {
        UserController::offline();
        Auth::logout();
        return redirect()->route('main');
    }
}
