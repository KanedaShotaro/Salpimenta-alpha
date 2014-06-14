<?php

Block::test();

if (empty($_GET['zona'])) {
    $zonaNombre = 'Explora';
} else {
    $zonaNombre = 'Mi Salpimenta';
}

function recuperarSeccionesUsuario() {
    $max_secciones = 12;
    $numSecciones = array();
    $secciones = array();
    $usuarioBd = new UsuarioBd();

    $numSecciones = $usuarioBd->recuperarSeccionesUsuario($_SESSION["usuario"][0]->getCodigoUsuario());
    
    for ($x = 0; $x < count($numSecciones); $x++) {
        $secciones[$x] = new Seccion($numSecciones[$x]);
    }
    
    return $secciones;
}

function recuperarSecciones() {
    $max_secciones = 12;
    $numSecciones = array();
    $secciones = array();

    for ($x = 0; $x < $max_secciones; $x++) {
        $numSecciones[$x] = $x + 1;
    }
    for ($i = 0; $i < count($numSecciones); $i++) {
        $secciones[$i] = new Seccion($numSecciones[$i]);
    }
    return $secciones;
}

if ($zonaNombre == "Mi Salpimenta") {
    $secciones = recuperarSeccionesUsuario();
} else {
    $secciones = recuperarSecciones();
}

$view = new View("seccionesView", array("seccion" => $secciones, "zonaNombre" => $zonaNombre));
$view->execute();
