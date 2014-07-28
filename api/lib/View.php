<?php

class View extends \Slim\View {
    public function render($template) {
        return json_encode($this->data['mydata']);
    }
}
