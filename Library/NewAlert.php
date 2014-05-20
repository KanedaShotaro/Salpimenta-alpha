<?php

class NewAlert {

    protected $alert;

    function __construct($typeAlert, $titleAlert, $contentAlert) {
        $this->alert = new Alert($typeAlert, $titleAlert, $contentAlert);
        $_SESSION["alert"][0] = $this->alert;
    }
}
