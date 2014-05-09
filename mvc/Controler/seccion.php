<?php

echo "seccion.php/";
$seccion = $_GET["seccion"];

function activo($seccion, $sitio) {
    $activo = "activo-";
    $hover = "hover-";
    if ($sitio == $seccion) {
        return $activo . $seccion;
    } else {
        return $hover . $sitio;
    }
}

function numero_seccion($nombreSeccion) {
    switch ($nombreSeccion) {
        case "aperitivos":
            return 1;
            break;
        case "ensaladas-y-verduras":
            return 2;
            break;
        case "arroces-y-cereales":
            return 3;
            break;
        case "sopas-y-cremas":
            return 4;
            break;
        case "pastas-y-pizzas":
            return 5;
            break;
        case "legumbres":
            return 6;
            break;
        case "carnes":
            return 7;
            break;
        case "pescados-y-mariscos":
            return 8;
            break;
        case "huevos":
            return 9;
            break;
        case "setas-y-hongos":
            return 10;
            break;
        case "salsas":
            return 11;
            break;
        case "postres":
            return 12;
            break;
    }
}
function obtenerRecetasSeccion($seccion) {
    $array_recetas = array();
    $numSec = numero_seccion($seccion);
    $bd = poolBBDD();
    if ($bd->establecer_conexion()) {
        $array_recetas = $bd->recuperar_receta_seccion($numSec);
        $bd->cerrar_conexion();
        return $array_recetas;
    } else {
        echo "fallo en la conexión";
    }
}

$array_recetas = obtenerRecetasSeccion($seccion);

include '/var/www/Salpimenta-backend/mvc/View/secciones/' . $_GET["seccion"] . '.php';
