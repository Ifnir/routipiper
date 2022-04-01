<?php

namespace Ifnir\Routipiper;

class Attribute
{
    private static $path;

    private $controller;

    private function __construct($controller)
    {
        if (! class_exists($controller)) return 0;

        return new ReflectionClass($controller);

        
    }

    public static function getPath($controller)
    {
        if (! self::$path) self::$path = new self($controller);

        return self::$path;
    }
}