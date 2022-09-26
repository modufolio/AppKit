<?php

namespace App\Core;

class Roots
{
    CONST BASE = BASE_DIR . DS;
    CONST APP  = self::BASE . 'app';
    CONST CONFIG = self::BASE . 'config';
    CONST CORE = self::BASE . 'core';
    CONST ROUTES = self::BASE . 'routes';
    CONST STORAGE  = self::BASE . 'storage';
    CONST SITE = self::BASE . 'site';

    CONST ERRORS = self::SITE. DS . 'system';
    CONST VIEWS = self::BASE . 'site/views';
    CONST SNIPPETS = self::BASE . 'site/snippets';
    const LAYOUTS = self::BASE . 'site/layouts';

}