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

$app->view(new View());
$app->response->headers->set("Content-Type", "application/json");

// list of events
$app->get('/events', function () use ($app) {
    $db = $app->config('container')['db'];
    $data = array();

    $model = new EventModel($db);
    $data['events'] = $model->getSomeEvents();

    $app->render("foo.php", array("mydata" => $data));;
});

$app->run();
