<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Login form
     *
     * @return Factory|View
     */
    public function login()
    {
        return view('pages.auth.login');
    }

    /**
     * Main page
     *
     * @return Factory|View
     */
    public function main()
    {
        return view('pages.main');
    }

    /**
     * Page users
     *
     * @return Factory|View
     */
    public function users()
    {
        $users = UserController::getChilds();
        return view('pages.users', compact('users'));
    }

    /**
     * User`s page
     *
     * @param $id
     * @return Factory|View
     */
    public function user($id)
    {
        $users = UserController::getChilds($id);
        $user = UserController::getUser($id);
        return view('pages.user', compact('users', 'user'));
    }

    /**
     * Settings page
     *
     * @param $id
     * @return Factory|View
     */
    public function settings($id)
    {
        $settings = UserController::getSettings($id);
        $user = UserController::getUser($id);
        return view('pages.settings', compact('settings', 'user'));
    }

    /**
     * Creating user form
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('pages.createuser');
    }

    /**
     * Deleting user form
     *
     * @param $id
     * @return Factory|View
     */
    public function delete($id)
    {
        if (Auth::id() != $id) {
            $login = User::find($id)->login;
            return view('pages.deleteuser', compact('login', 'id'));
        } else {
            return redirect()->route('users')->with('error', 'You cannot delete yourself');
        }
    }
}
