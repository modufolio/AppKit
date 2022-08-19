<?php

// Turn off all error reporting
// error_reporting(0);

error_reporting(E_ALL);

define("START_TIMER", microtime(true));

require_once '../bootstrap.php';

// Path to the front controller (this file)
const DS = DIRECTORY_SEPARATOR;
const FCPATH = __DIR__ . DS;


echo (new \App\Core\App())->Run();

