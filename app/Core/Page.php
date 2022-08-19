<?php

namespace App\Core;

use Modufolio\Http\Response;
use Modufolio\Toolkit\Tpl;

class Page
{
    public static function notFound(): string
    {
        return (new Response(Tpl::load(Roots::ERRORS . DS . '404.php'),'text/html',404))->send();
    }

}