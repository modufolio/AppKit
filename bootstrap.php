<?php

const BASE_DIR = __DIR__;

define("START_BOOTSTRAP", microtime(true));

/**
 * Validate the PHP version to already
 * stop at older or too recent versions
 */
if (
    version_compare(PHP_VERSION, '7.4.0', '>=') === false ||
    version_compare(PHP_VERSION, '8.1.0', '<')  === false
) {
    die(include __DIR__ . '/site/snippets/system/php.php');
}

if (is_file($autoloader = dirname(__DIR__) . '/vendor/autoload.php')) {

    /**
     * Always prefer a site-wide Composer autoloader
     * if it exists, it means that the user has probably
     * installed additional packages
     */
    include $autoloader;
} elseif (is_file($autoloader = __DIR__ . '/vendor/autoload.php')) {

    /**
     * Fall back to the local autoloader if that exists
     */
    include $autoloader;
}
/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/app/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require __DIR__ . '/app/' . str_replace('\\', '/', $class) . '.php';
    }
});

if (is_file($helpers = __DIR__ . '/helpers.php')) {

    /**
     * Load the helpers
     */
    include $helpers;
}
define("TIME_BOOTSTRAP", microtime(true) - START_BOOTSTRAP);

