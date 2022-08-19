<?php

namespace App\Core;

use Modufolio\Toolkit\Silo;
use Modufolio\Traits\Singleton;

final class Site extends Silo
{
    use Singleton;

    public static $data = [];

    public function __get($property)
    {
        return self::get($property);
    }
}
Site::set(Load::config('site'));