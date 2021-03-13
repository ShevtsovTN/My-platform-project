<?php
// Users

use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('users', function ($trail) {
    $trail->push('Users', route('users'));
});
Breadcrumbs::for('user', function ($trail, $user) {
    $trail->parent('users');
    $trail->push($user['login'], route('user', $user['id']));
});
Breadcrumbs::for('settings', function ($trail, $user) {
    $trail->parent('user', $user);
    $trail->push('Settings', route('userSettings', $user['id']));
});
