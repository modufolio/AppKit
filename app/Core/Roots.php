<?php

namespace App\Core;

class Roots
{
    CONST BASE = BASE_DIR . DS;
    CONST SITE = self::BASE . 'site' . DS;
    CONST APP  = self::BASE . 'app' . DS;
    CONST CORE = self::BASE . 'core' . DS;
    CONST STORAGE  = self::BASE . 'storage' . DS;
    CONST CONFIG = self::SITE. 'config' . DS;


    CONST ERRORS = self::SITE.  'system';
    CONST VIEWS = self::BASE . 'site/views';
    CONST SNIPPETS = self::BASE . 'site/snippets';
    const LAYOUTS = self::BASE . 'site/layouts';

}