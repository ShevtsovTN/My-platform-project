<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Mark user as "online"
     */
    public static function online()
    {
        User::where('id', Auth::id())->update(['online' => 1, 'updated_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Mark user as "offline"
     */
    public static function offline()
    {
        User::where('id', Auth::id())->update(['online' => 0, 'updated_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Create user
     * @param Request $request
     */
    public function create(Request $request)
    {

    }

    /**
     * Delete user
     */
    public function delete()
    {

    }

    /**
     * Get all descendants of a user
     * @param null $id
     * @return mixed
     */
    public static function getChilds($id = null)
    {
        $id = $id?? Auth::id();
        $query = User::select('id', 'login', 'email', 'currency', 'cash', 'online')
            ->where('parent', '=', $id)
            ->unionAll(
                User::select('users.id', 'users.login', 'users.email', 'users.currency', 'users.cash', 'users.online')
                    ->join('cte', 'cte.id', '=', 'users.parent')
            );
        $childs = DB::table('cte')
            ->withRecursiveExpression('cte', $query)
            ->get()->toArray();
        return $childs;
    }

    /**
     * Get all user settings to display on the settings page
     * @param $id
     * @return mixed
     */
    public static function getSettings($id)
    {
        $user = User::where('id', '=', $id)->limit(1)->get()->toArray()[0];
        $settingsArr = include(config_path('settings.php'));
        $settings = $settingsArr[$user['group']];
        return $settings;
    }

    /**
     * Set user preferences to display on preferences page
     * @param Request $request
     */
    public static function setSettings(Request $request)
    {
        dd($request);
    }

    public static function getUser($id)
    {
        return User::where('id', '=', $id)->get()->toArray()[0];
    }
}
