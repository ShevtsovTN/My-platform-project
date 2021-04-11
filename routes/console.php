<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
Artisan::command('users_online_check', function () {
    $this->info('Checking users process started');
    $timeline = date('Y-m-d H:i:s', mktime(date("H"), date("i") - 1, date("s"), date("m")  , date("d"), date("Y")));
    User::where('updated_at', '<', $timeline)->update([
        'online' => 0
    ]);
    $this->info('Checking users process finished');
})->purpose('Checking online users');
