<?php

namespace App\Core;

use Modufolio\Http\Response;
use Modufolio\Toolkit\Tpl;

class Page
{
    public static function notFound(): string
    {
        $file = Roots::ERRORS . DS . '404.php';
        return (new Response(Tpl::load($file ),'text/html',404))->send();
    }

}