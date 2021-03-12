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
        return view('pages.user', compact('users', 'id'));
    }

    public function settings($id)
    {
        $settings = UserController::getSettings($id);
        return view('pages.settings', compact('settings', 'id'));
    }

    public function create()
    {
        $group = Auth::user()->group;
        switch ($group) {
            case 0:
                $fields = [
                   'creatableUsersGroups' => [
                       1 => 'superagent',
                       2 => 'agent',
                       3 => 'diller',
                       4 => 'hall',
                       5 => 'terminal'
                   ]
                ];
                break;
            case 1:
                $fields = [
                    'creatableUsersGroups' => [
                        2 => 'agent'
                    ]
                ];
                break;
            case 2:
                $fields = [
                    'creatableUsersGroups' => [
                        3 => 'diller'
                    ]
                ];
                break;
            case 3:
                $fields = [
                    'creatableUsersGroups' => [
                        4 => 'hall'
                    ]
                ];
                break;
            case 4:
                $fields = [
                    'creatableUsersGroups' => [
                        5 => 'terminal'
                    ]
                ];
                break;
            default:
                break;
        }
        return view('pages.createuser', compact('fields'));
    }
}
