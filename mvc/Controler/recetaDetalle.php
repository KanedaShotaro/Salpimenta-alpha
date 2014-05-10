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
$seccion = $_GET["seccion"];
$usuario = $_SESSION["usuario"][0];
$receta = obtenerDetalleReceta($_GET["urlReceta"]);
obtenerValoracionUsuario($receta, $usuario);


ob_start();
include '/var/www/Salpimenta-backend/mvc/View/recetaDetalleView.php';
$tpl_content = ob_get_clean();
require '/var/www/Salpimenta-backend/mvc/View/layoutView.php';

