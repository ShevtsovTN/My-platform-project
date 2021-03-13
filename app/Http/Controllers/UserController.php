<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        if (Auth::id() != $id) {
            $settings = $settingsArr[$user['group']];
        } else {
            $settings = $settingsArr['self'];
            $timezones = [];
            for ($i = -12 ; $i < 13; $i++) {
                $timezones['UTC' . ($i >= 0 ? '+'.$i : $i)] = 'UTC' . ($i >= 0 ? '+'.$i : $i) . (!empty(timezone_name_from_abbr('', $i * 3600, 0))
                    ? ' ' . timezone_name_from_abbr('', $i * 3600, 0)
                    : '');
            }
            foreach ($settings as $index => &$settingsIndex) {
                foreach ($settingsIndex as $i => &$settingIndex) {
                    if ($settingIndex['name'] == 'timezone') {
                        $settingIndex['options'] = $timezones;
                    }
                    if (isset($user[$settingIndex['name']])) {
                        $settingIndex['value'] = $user[$settingIndex['name']];
                    }
                }
                unset($settingIndex);
            }
            unset($settingsIndex);
        }
        return $settings;
    }

    /**
     * Set user preferences to display on preferences page
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public static function setSettings(Request $request, $id)
    {
        $request->validate([
            'timezone' => 'required|regex:/UTC[-+][0-9]{1,2}/i',
            'email' => 'email',
            'password' => 'confirmed'
        ]);
        if (Auth::id() == $id) {
            $user = [];
            foreach ($request->all() as $index => $value) {
                if ($index != '_token' && $index != 'password_confirmation' && !is_null($value)) {
                    if ($index != 'password') {
                        $user[$index] = $value;
                    } else {
                        $user[$index] = Hash::make($value);
                    }
                }
            }
            if (!isset($request->email_verified)) {
                $user['email_verified'] = 0;
            }
            User::where('id', '=', $id)->update($user);
        }
        return redirect()->route('userSettings', $id);
    }

    public static function getUser($id)
    {
        return User::where('id', '=', $id)->get()->toArray()[0];
    }
}
