<?php

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

];




