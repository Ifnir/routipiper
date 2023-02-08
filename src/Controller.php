<?php

namespace Ifnir\Routipiper;

use ReflectionClass;
use ReflectionMethod;
use Ifnir\Routipiper\Attribute\Route;

class Controller
{

    private static $class;

    public $attribute, $c;

    private function __construct($attribute)
    {
        if (! class_exists($attribute)) return 0;
        if ($attribute) $this->setReflection($attribute);
    }

    public static function getClass($attribute)
    {
        if (! self::$class) self::$class = new self($attribute);

        return self::$class;
    }

    public function setReflection($attribute)
    {
        $this->attribute = new ReflectionClass($attribute);
        $this->c = $attribute; 

        return $this;
    }

    public function getRouteMethods()
    {
        $attributes = null;

        foreach($this->attribute->getMethods(ReflectionMethod::IS_PUBLIC) as $method)
        {
            $reflectionMethod = new ReflectionMethod($this->c, $method->getName());
    
            $attributes = $reflectionMethod->getAttributes(Route::class);
            
        }

        $this->getAttributes($attributes);

        return $this;
    }

    public function getAttributes($attributes)
    {

        $test = array_map(fn() => $attributes[0]->getArguments(), $attributes);
        var_dump($test[0]);
        echo "<br/>";
        echo "\n\r" . $test[0]["methods"];
        
    }
}