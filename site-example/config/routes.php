<?php

use App\Core\View;

return   [
    [
        'pattern' => '/',
        'action'  => function() {
            return ['message' => 'Hello World!'];
        }
    ],
    [
        'pattern' => 'hello/(:any)',
        'action'  => function ($name) {
            return "Hello $name";
        }
    ],
    [
        'pattern' => '/view',
        'action'  => function() {

            return View::render('home/index', [
                'name'    => 'AppKit',
                'colours' => ['red', 'green', 'blue']
            ]);

        }
    ],

];




