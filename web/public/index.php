<?php

require "../vendor/autoload.php";
spl_autoload_register(function($classname) {
    include __DIR__ . "/../lib/" . $classname . ".php";
});

$app = new \Slim\Slim(array(
    "templates.path" => __DIR__ . '/../templates/')
);

$app->get('/', function () use ($app) {
    $client = new ApiClient(new GuzzleHttp\Client());
    $events = $client->getEventList();
    $app->render("index.php", array("events" => $events));
});

$app->get('/showEvent/:event_id', function ($event_id) use ($app) {
    $client = new ApiClient(new GuzzleHttp\Client());
    $events = $client->getEvent($event_id);
    $app->render("detail.php", array("events" => $events));
});

$app->run();


