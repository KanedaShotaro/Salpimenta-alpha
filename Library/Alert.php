<?php

/*
 * La clase alert genera un objeto alert que tiene tres parametros. el tipo de alert
 * (que corresponde con el css) el titulo del alert (que corresponde con el
 * contenido de la etiqueta Strong del mensaje) y el contenido del alert
 * (que es el texto informativo del alert)
 * 
 * los typeAlert posibles son:
 * access --> fondo verce
 * info --> fondo azul
 * warning --> fondo amarillo
 * danger --> fondo rojo
 */
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

    public function setTypeAlert($typeAlert) {
        $this->typeAlert = $typeAlert;
    }

    public function setTitleAlert($titleAlert) {
        $this->titleAlert = $titleAlert;
    }

    public function setContentAlert($contentAlert) {
        $this->contentAlert = $contentAlert;
    }
    
    


}
