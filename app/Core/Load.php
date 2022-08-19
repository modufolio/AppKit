<?php

namespace App\Core;

class Load
{
    public static function config(string $file): array
    {
        $config = require_once Roots::CONFIG . $file . '.php';
        return is_array($config) ? $config : [];
    }


    public static function controller(string $controller): object
    {
        $controller = 'App\\Controllers\\' . $controller;
        return new $controller;
    }

    public static function model(string $model): object
    {
        $model = 'App\\Models\\' . $model;
        return new $model;
    }
}