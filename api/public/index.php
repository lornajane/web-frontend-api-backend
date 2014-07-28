<?php

require "../vendor/autoload.php";

$app = new \Slim\Slim();

// set up some dependencies
$container = new \Pimple\Container();
$container['db']  = function ($c) {
    $db = new PDO("mysql:host=localhost;dbname=joindin", "joindin", "joindin");
};
$app->config('container', $container);

// list of events
$app->get('/events', function () use ($app) {
    $db = $app->config('container')['db'];
});

$app->run();
