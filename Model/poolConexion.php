<?php

function poolBBDD() {
    /* Servidor Javi*/
     $bd = new BaseDatos('192.168.56.3', 'alumno', 'alumno', 'SALPIMENTA');
    /*Servidor Pablo*/
//    $bd = new BaseDatos('127.0.0.1', 'root', 'root', 'salpimenta');
    return $bd;
}

