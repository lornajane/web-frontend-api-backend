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

// one event
$app->get('/events/:event_id', function ($event_id) use ($app) {
    $db = $app->config('container')['db'];
    $data = array();

    $model = new EventModel($db);
    $data['events'] = $model->getOneEvent($event_id);

    $app->render("foo.php", array("mydata" => $data));;
});
// end one event

// start auth
$app->post('/authorizations', function () use ($app) {
    $db = $app->config('container')['db'];
    $data = array();

    // totally assuming JSON, should be checking headers etc
    $in = json_decode(file_get_contents("php://input"), true);

    $model = new AuthModel($db);
    $data['access_token'] = $model->getAccessTokenFromCreds(
        $in['username'], $in['password']);

    $app->render("foo.php", array("mydata" => $data));
}); // end auth


$app->run();
