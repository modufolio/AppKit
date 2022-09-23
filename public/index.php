<?php

use App\Core\App;
use App\Core\Load;

// Turn off all error reporting
// error_reporting(0);

define("START_TIMER", microtime(true));

require_once '../bootstrap.php';
$urlPath = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Path to the front controller (this file)
const DS = DIRECTORY_SEPARATOR;
const FCPATH = __DIR__;

$app = new App([
    'uri' => $_SERVER['argv'][1] ?? $urlPath,
    'method' => $_SERVER['REQUEST_METHOD'] ?? 'GET',
    'routes' => str_starts_with($urlPath, '/api') ? Load::routes('api.php') : Load::routes('web.php'),
    'options' => Load::config('options.php', 'options', true),
]);

// Run the application
echo $app->run();


