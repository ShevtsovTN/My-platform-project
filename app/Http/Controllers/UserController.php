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
        User::where('id', '=', Auth::id())->update(['online' => 1, 'updated_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Mark user as "offline"
     */
    public static function offline()
    {
        User::where('id', '=', Auth::id())->update(['online' => 0, 'updated_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Create user
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
            'login' => 'required|unique:users',
            'group' => 'required',
        ]);
        $relationsArr = [
            0 => 'App\\Models\\Admin',
            1 => 'App\\Models\\SuperAgent',
            2 => 'App\\Models\\Agent',
            3 => 'App\\Models\\Diller',
            4 => 'App\\Models\\Hall',
            5 => 'App\\Models\\Terminal',
        ];
        $relations = $relationsArr[$request->group]::create();
        if (!empty($relations->id)) {
            User::insert([
                'parent' => Auth::id(),
                'group' => $request->group,
                'login' => $request->login,
                'password' => Hash::make($request->password),
                'settings_type' => $relationsArr[$request->group],
                'settings_id' => $relations->id,
                'timezone' => 'UTC+0',
                'email_verified' => 0,
            ]);
            $request->session()->flash('success', 'User created');
        } else {
            $request->session()->flash('error', 'Error while creating user');
        }
        return redirect()->back();
    }

    /**
     * Delete user
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $user = User::find($request->id);
        if (!empty($user)) {
            $user->settings()->delete();
            User::destroy($request->id);
            $request->session()->flash('success', 'User deleted');
            return redirect()->route('users');
        }
        $request->session()->flash('error', 'User was not deleted');
        return redirect()->route('users');
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
        foreach ($childs as $index => &$child) {
            $child->cash = number_format($child->cash, 2, ',',' ');
        }
        unset($child);
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
        $settings = [];
        $settingsArr = include(config_path('settings.php'));
        if (Auth::id() != $id) {
            $additionalSettings = User::find($id)->settings;
            foreach ($settingsArr[$user['group']] as $index => $item) {
                if ($index == 'base') {
                    $settings['base'] = array_merge($settingsArr['self']['base'], $settingsArr[$user['group']]['base']);
                } else {
                    $settings[$index] = $settingsArr[$user['group']][$index];
                }
            }
        } else {
            $settings = $settingsArr['self'];
        }
        $timezones = [];
        for ($i = -12; $i < 13; $i++) {
            $timezones['UTC' . ($i >= 0 ? '+' . $i : $i)] = 'UTC' . ($i >= 0 ? '+' . $i : $i) . (!empty(timezone_name_from_abbr('', $i * 3600, 0))
                    ? ' ' . timezone_name_from_abbr('', $i * 3600, 0)
                    : '');
        }
        foreach ($settings as $index => &$settingsIndex) {
            foreach ($settingsIndex as $i => &$settingIndex) {
                if (isset($timezones) && $settingIndex['name'] == 'timezone') {
                    $settingIndex['options'] = $timezones;
                }
                if (isset($user[$settingIndex['name']])) {
                    $settingIndex['value'] = $user[$settingIndex['name']];
                }
                if (isset($additionalSettings) && isset($additionalSettings->{$settingIndex['name']})) {
                    $settingIndex['value'] = $additionalSettings->{$settingIndex['name']};
                }
            }
            unset($settingIndex);
        }
        unset($settingsIndex);
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
            'timezone' => 'regex:/UTC[-+][0-9]{1,2}/i',
            'email' => 'email',
            'password' => 'confirmed'
        ]);
        $settings = self::getAllSettingsList($id);
        $setSelfSettings = [];
        foreach ($settings['self'] as $i => $item) {
            if (isset($request->{$item['name']})) {
                if ($item['name'] == 'password_confirmation') {
                    continue;
                }
                if ($item['name'] == 'password') {
                    $setSelfSettings[$item['name']] = Hash::make($request->{$item['name']});
                } else {
                    $setSelfSettings[$item['name']] = $request->{$item['name']};
                }
            }
        }
        if (isset($request->base) && $request->base == 'send') {
            User::where('id', '=', $id)->update($setSelfSettings);
        }
        if (Auth::id() != $id) {
            $setAdditionSettings = [];
            foreach ($settings['additional'] as $i => $item) {
                if (isset($request->{$item['name']})) {
                    $setAdditionSettings[$item['name']] = $request->{$item['name']};
                }
            }
            $user = User::find($id);
            $user->settings()->update($setAdditionSettings);
        }
        $request->session()->flash('success', 'Settings have been saved');
        return redirect()->route('userSettings', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getUser($id)
    {
        return User::where('id', '=', $id)->get()->toArray()[0];
    }

    /**
     * @param $id
     * @return array
     */
    private static function getAllSettingsList($id)
    {
        $settingsList = [
            'self' => [],
            'additional' => []
        ];
        $settingsArr = include(config_path('settings.php'));
        $group = User::find($id)->group;
        foreach ($settingsArr['self']['base'] as $index => $item) {
            if ($item['type'] == 'checkbox') {
                $settingsList['self'][] = [
                    'name' => $item['name'],
                    'type' => $item['type'],
                ];
            } else {
                $settingsList['self'][] = ['name' => $item['name']];
            }
        }
        if (Auth::id() != $id) {
            foreach ($settingsArr[$group] as $i => $items) {
                foreach ($items as $index => $item) {
                    if ($item['type'] == 'checkbox') {
                        $settingsList['additional'][] = [
                            'name' => $item['name'],
                            'type' => $item['type'],
                        ];
                    } else {
                        $settingsList['additional'][] = ['name' => $item['name']];
                    }
                }
            }
        }
        return $settingsList;
    }

    /**
     * Find user by login
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function searchUser(Request $request)
    {
        $request->validate([
            'searchUser' => 'required'
        ]);
        $childs = self::getChilds();
        foreach ($childs as $index => $child) {
            if ($request->searchUser == $child->login) {
                return redirect()->route('userSettings', $child->id);
            }
        }
        $request->session()->flash('error', 'User not found');
        return redirect()->back();
    }
}
