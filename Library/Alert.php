<?php

class Alert {

    protected $typeAlert;
    protected $titleAlert;
    protected $contentAlert;
    
    function __construct($typeAlert, $titleAlert, $contentAlert) {
        $this->typeAlert = $typeAlert;
        $this->titleAlert = $titleAlert;
        $this->contentAlert = $contentAlert;
    }

    public function getTypeAlert() {
        return $this->typeAlert;
    }

    public function getTitleAlert() {
        return $this->titleAlert;
    }

    public function getContentAlert() {
        return $this->contentAlert;
    }
    
    


}
