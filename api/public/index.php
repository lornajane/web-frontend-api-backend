<?php

require "../vendor/autoload.php";
spl_autoload_register(function($classname) {
    include __DIR__ . "/../lib/" . $classname . ".php";
});

$app = new \Slim\Slim();

// set up some dependencies
$container = new \Pimple\Container();
$container['db']  = function ($c) {
    $db = new PDO("mysql:host=localhost;dbname=joindin", "joindin", "joindin");
    return $db;
};
$app->config('container', $container);

// list of events
$app->get('/events', function () use ($app) {
    $db = $app->config('container')['db'];
    $model = new EventModel($db);
    $events = $model->getSomeEvents();
    print_r($events);
});

$app->run();
