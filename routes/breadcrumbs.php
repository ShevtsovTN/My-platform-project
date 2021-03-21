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
Breadcrumbs::for('createUser', function ($trail) {
    $trail->parent('users');
    $trail->push('Create User', route('createUserForm'));
});

Breadcrumbs::for('messagesList', function ($trail) {
    $trail->push('Messages', route('messagesList'));
});
Breadcrumbs::for('createMessage', function ($trail) {
    $trail->parent('messagesList');
    $trail->push('Create Message', route('createMessage'));
});
Breadcrumbs::for('showMessage', function ($trail, $message) {
    $trail->parent('messagesList');
    $trail->push($message['subject'], route('showMessage', $message));
});
Breadcrumbs::for('editMessage', function ($trail, $message) {
    $trail->parent('messagesList');
    $trail->push($message, route('editMessage', $message));
});
