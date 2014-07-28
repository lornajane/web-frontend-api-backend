<?php

require "../vendor/autoload.php";
spl_autoload_register(function($classname) {
    include __DIR__ . "/../lib/" . $classname . ".php";
});

$app = new \Slim\Slim(array(
    "templates.path" => __DIR__ . '/../templates/')
);

$app->get('/', function () use ($app) {
    $app->render("index.php");
});

$app->run();


