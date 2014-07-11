<?php

/*
 * La clase alertAction tiene un metodo publico y statico que crea un alert y lo asigna a la sesion "alert".
 * Los parametros que se le pasan son el tipo de alerta, el titulo y el contenido 
 * que se encuentran explicados en el comentario de la clase alert.
 */

class AlertAction {

    public static function create($typeAlert, $titleAlert, $contentAlert) {
        $alert = new Alert($typeAlert, $titleAlert, $contentAlert);
        $_SESSION['alert'][0] = $alert;
    }

}
