<?php

namespace GraphicGenie\LaravelOxxa;

class LaravelOxxa
{
    public static function __callStatic($class, $args)
    {
        dd($class, $args);
        return new $class($args);
    }
}
