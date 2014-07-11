<?php

class Request {

    protected $url;
    protected $controller;
    protected $defaultUrl = 'homeControler';
    //protected $defaultAction = 'index';

    public function __construct($url) {
        $this->url = $url;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getDefaultUrl() {
        return $this->defaultUrl;
    }

    public function execute() {

        $url = $this->getUrl();
        $urlDefault = $this->getDefaultUrl();

        if (empty($url)) {
            require './Controler/' . $urlDefault . '.php';
        } else {
            require './Controler/' . $url . '.php';
        }
    }

}
