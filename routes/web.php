<?php

return   [
    [
        'pattern' => '/',
        'action'  => function() {
            return ['message' => 'Hello AppKit'];
        }
    ],
    [
        'pattern' => '/test',
        'action'  => function() {
            return 'Hello AppKit';
        }
    ],

];




