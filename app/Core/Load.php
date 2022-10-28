<?php

namespace App\Core;

use Modufolio\Toolkit\Config;

class Load
{
    public static function config(string $file, bool $setConfig = false): array
    {
        $config = include Roots::CONFIG . DS . $file;
        $config = is_array($config) ? $config : [];
        if($setConfig && !empty($config)) {
            foreach ($config as $key => $value) {
                Config::set($key, $value);
            }
        }
        return $config;
    }

    public static function routes(string $file): array
    {
        $routes = include Roots::ROUTES . DS . $file;
        $routes = is_array($routes) ? $routes : [];
        return $routes;
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