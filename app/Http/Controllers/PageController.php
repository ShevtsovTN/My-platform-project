<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function main()
    {
        return view('pages.main');
    }

    public function users()
    {
        $users = UserController::getChilds();
        return view('pages.users', compact('users'));
    }

    public function user($id)
    {
        $users = UserController::getChilds($id);
        $user = UserController::getUser($id);
        return view('pages.user', compact('users', 'user'));
    }

    public function settings($id)
    {
        $settings = UserController::getSettings($id);
        $user = UserController::getUser($id);
        return view('pages.settings', compact('settings', 'user'));
    }

    public function create()
    {
        return view('pages.createuser');
    }
}
