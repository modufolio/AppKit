<?php

use App\Models\User;

return   [
    [
        'pattern' => '/',
        'action'  => function() {
            return ['message' => 'Hello AppKit'];
        }
    ],
    [
        'pattern' => '/version',
        'action'  => function() {

            return app()::VERSION;
        }
    ],
    [
        'pattern' => '/users',
        'action'  => function() {

            $users = User::all();

            return $users->toArray();
        }
    ],

];




