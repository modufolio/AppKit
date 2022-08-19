<?php

namespace App\Core;

use App\Libraries\Ninox;
use Exception;
use Modufolio\Toolkit\Tpl;
use Throwable;

class Dispatch
{
    /**
     * @throws Exception
     * @throws Throwable
     */
    public static function actionController($controller, $action, $params = [])
    {
        $controller = '\App\\Controllers\\' . $controller. 'Controller';

        if (!class_exists($controller)) {
            return Tpl::load(Roots::ERRORS . DS . '404.php');
        }

        $method= self::getMethodFromAction($action);

        $controller_object = new $controller();

        if (!is_callable([$controller_object, $method])) {
            return Tpl::load(Roots::ERRORS . DS . '404.php');
        }

        return $controller_object->$method($params);
    }

    public static function getMethodFromAction(string $action): string
    {
        return lcfirst($action) . 'Action';
    }
}
