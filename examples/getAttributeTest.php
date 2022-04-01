<?php

require_once (__DIR__ . '/../vendor/autoload.php');

use Ifnir\Routipiper\Attribute;

#[Attribute(value:1234)]
class TestClass {}


$test = Attribute::getPath(TestClass::class);

var_dump($test);