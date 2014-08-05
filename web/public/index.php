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

$app->get('/login', function () use ($app) {
    $app->render("login.php");
});

$app->post('/login', function () use ($app) {
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $client = new ApiClient(new GuzzleHttp\Client());
    $access_token = $client->getAccessToken($username, $password);
    // store it for later use
    $_SESSION['access_token'] = $access_token;
    $app->redirect('/');
});

$app->run();


