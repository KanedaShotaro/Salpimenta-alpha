<?php

$seccion = $_GET["seccion"];

if (empty($_GET["zona"])) {
    $zona = "explora";
} else {
    $zona = $_GET["zona"];
}


$seccionDetalle = new SeccionDetalle($zona, $seccion);
$seccionDetalle->execute();

//function activo($seccion, $sitio) {
//    $activo = "activo-";
//    $hover = "hover-";
//    if ($sitio == $seccion) {
//        return $activo . $seccion;
//    } else {
//        return $hover . $sitio;
//    }
//}
//
//function numero_seccion($nombreSeccion) {
//    switch ($nombreSeccion) {
//        case "aperitivos":
//            return 1;
//            break;
//        case "ensaladas-y-verduras":
//            return 2;
//            break;
//        case "arroces-y-cereales":
//            return 3;
//            break;
//        case "sopas-y-cremas":
//            return 4;
//            break;
//        case "pastas-y-pizzas":
//            return 5;
//            break;
//        case "legumbres":
//            return 6;
//            break;
//        case "carnes":
//            return 7;
//            break;
//        case "pescados-y-mariscos":
//            return 8;
//            break;
//        case "huevos":
//            return 9;
//            break;
//        case "setas-y-hongos":
//            return 10;
//            break;
//        case "salsas":
//            return 11;
//            break;
//        case "postres":
//            return 12;
//            break;
//    }
//}
//
//function obtenerRecetasSeccionUsuario($seccion, $codigoUsuario) {
//    $array_recetas = array();
//    $numSec = numero_seccion($seccion);
//    $RecetaBd = new RecetaBd();
//
//    $array_recetas = $RecetaBd->recuperar_receta_seccion_usuario($numSec, $codigoUsuario);
//    return $array_recetas;
//}
//
//function obtenerRecetasSeccion($seccion) {
//    $array_recetas = array();
//    $numSec = numero_seccion($seccion);
//    $RecetaBd = new RecetaBd();
//
//    $array_recetas = $RecetaBd->recuperar_receta_seccion($numSec);
//    return $array_recetas;
//}
//
//if ($_GET["zona"] == "misalpimenta") {
//    $recetas = obtenerRecetasSeccionUsuario($seccion, $_SESSION["usuario"][0]->getCodigoUsuario());
//} else {
//    $recetas = obtenerRecetasSeccion($seccion);
//}
//
//$view = new View("seccionDetalleView", array('seccion' => $seccion, 'recetas' => $recetas,'zona' => $zona));
//$view->execute();

