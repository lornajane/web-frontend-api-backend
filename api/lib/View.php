<?php

class View extends \Slim\View {
    public function render($template) {
        $app = \Slim\Slim::getInstance();
        $app->response->headers->set('Content-Type', 
            'application/json');
        return json_encode($this->data['mydata']);
    }
}
