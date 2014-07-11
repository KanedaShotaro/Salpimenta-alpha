<?php

Block::test();

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

if ($_GET['zona'] == "misalpimenta") {
    $secciones = recuperarSeccionesUsuario();
    $zonaNombre = 'Mi Salpimenta';
} else {
    $secciones = recuperarSecciones();
    $zonaNombre = 'Explora';
}

if (count($secciones) == 0) {
    $view = new View("seccionVaciaView");
    $view->execute();
} else {
    $view = new View("seccionesView", array("seccion" => $secciones, "zonaNombre" => $zonaNombre, "zona" => $_GET["zona"]));
    $view->execute();
}


