<?php

echo"recetaDetalle.php/";

function obtenerDetalleReceta($urlReceta) {
    $bd = poolBBDD();
    if ($bd->establecer_conexion()) {
        if ($bd->comprobarRecetaUrl($urlReceta)) {
            $array_receta = $bd->recuperarOfertaUrl($urlReceta);
            $receta = $array_receta[0];
            $bd->cerrar_conexion();
            return $receta;
        } else {
            echo "error";
        }
    }
}

function obtenerValoracionUsuario(&$receta, $usuario) {
    $bd = poolBBDD();
    if ($bd->establecer_conexion()) {
        $valusuario = $bd->recuperarValUsuario($receta->getCodigoReceta(), $usuario->getCodigoUsuario());

        if ($valusuario[0] == null) {
            $valusuario[0] = "Sin valorar";
        }
        $bd->cerrar_conexion();
        $receta->setValUsuario($valusuario[0]);
    }
}

function obtenerAutorReceta($codigoReceta) {
    $bd = poolBBDD();
    if ($bd->establecer_conexion()) {
        $array_autor = $bd->recuperarAutorReceta($codigoReceta);
        $autor = $array_autor[0];
        $bd->cerrar_conexion();
        return $autor;
    }
}

$receta = obtenerDetalleReceta($_GET["urlReceta"]);
$seccion = $_GET["seccion"];
$autor = obtenerAutorReceta($receta->getCodigoReceta());
obtenerValoracionUsuario($receta, $_SESSION['usuario'][0]);


$view = new View("recetaDetalleView", array('seccion' => $seccion, 'autor' => $autor, 'receta' => $receta));
$view->execute();


