<?php

namespace GraphicGenie\LaravelOxxa\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static Domains()
 * @method static Contacts()
 * @method static Cart()
 **/

class Oxxa extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "oxxa";
    }

    public static function __callStatic($class, $args)
    {
        if (class_exists("\\GraphicGenie\\LaravelOxxa\\API\\" . $class)) {
            $class = "\\GraphicGenie\\LaravelOxxa\\API\\" . $class;
        } else {
            throw new \BadMethodCallException($class . " not found");
        }

        return new $class($args);
    }
}
