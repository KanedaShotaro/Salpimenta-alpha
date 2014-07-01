<?php

function poolBBDD() {
    $bd = new BaseDatos('192.168.56.3', 'alumno', 'alumno', 'SALPIMENTA');
    return $bd;
}

