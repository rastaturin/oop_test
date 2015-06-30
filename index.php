<?php

$app = new Application(fopen ("php://stdin","r"));
$app->run();

function __autoload($class)
{
    require $class . '.php';
}