<?php

require_once (__DIR__ . '/../vendor/autoload.php');

use Ifnir\Routipiper\Controller;
use Ifnir\Routipiper\Attribute\Route;

class Test {
    #[Route('/home/', methods: 'GET', alias: 'home')]
    public function index(): void
    {

    }
}

$reflector = Controller::getClass(Test::class)->getMethods();
