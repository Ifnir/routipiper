<?php

namespace Ifnir\Routipiper;

use ReflectionClass;
use ReflectionMethod;

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

    // Change name on this function
    public function setReflection($attribute)
    {
        $this->attribute = new ReflectionClass($attribute);
        $this->c = $attribute; 

        return $this;
    }

    public function getMethods()
    {

        foreach($this->attribute->getMethods(ReflectionMethod::IS_PUBLIC) as $method)
        {
            $reflectionMethod = new ReflectionMethod($this->c, $method->getName());
    
            $attributes = $reflectionMethod->getAttributes(Route::class);
        
            echo "reflecting method '", $method->getName(), "'\r\n";
            foreach ($attributes as $attribute) {
               var_dump($attribute->newInstance());
            }
        }

        return $this;
    }

    public function getAttributes()
    {
        $r_att = $this->attribute->getAttributes(Controller::class, 0);

        var_dump($r_att);

        return $this;
    }
}