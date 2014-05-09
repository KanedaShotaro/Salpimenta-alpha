<?php

echo "home.php/";

if (isset($_SESSION["usuario"])) {
    header("Location: /Salpimenta-backend/mvc/Controler/index.php?url=miSalpimenta");
}else{
    include '/var/www/Salpimenta-backend/mvc/View/homeView.php';
}


//function obtenerSeccionConReceta($numSeccion) {
//    /* Funcion que devuelve un array con todas las recetas por el numero de seccion a la que corresponde  */
//    $bd = poolBBDD();
//    if ($bd->establecer_conexion()) {
//        $array_recetas = $bd->recuperar_receta_seccion($numSeccion);
//        if (!$array_recetas == 0) {
//            $bd->cerrar_conexion();
//            return $array_recetas;
//        }
//    } else {
//        echo "fallo en la conexión";
//    }
//}
//
//function seccionRandom() {
//    // genera un array de numeros random entre el 0 y el 12
//    $arrayNumerosAleatorios = array();
//    $i = 0;
//    while ($i < 12) {
//
//        $num = mt_rand(1, 12);
//        if (!in_array($num, $arrayNumerosAleatorios)) {
//            $arrayNumerosAleatorios[$i] = $num;
//            $i++;
//        }
//    }
//    return $arrayNumerosAleatorios;
//}
//
//function nombresSeccionesNumero($numero) {
//    switch ($numero) {
//        case 1:
//            return "aperitivos";
//            break;
//        case 2:
//            return "ensalada y verduras";
//            break;
//        case 3:
//            return "arroces y cereales";
//            break;
//        case 4:
//            return "sopas y cremas";
//            break;
//        case 5:
//            return "pasta y pizza";
//            break;
//        case 6:
//            return "legumbres";
//            break;
//        case 7:
//            return "carnes";
//            break;
//        case 8:
//            return "pescado y mariscos";
//            break;
//        case 9:
//            return "huevos";
//            break;
//        case 10:
//            return "setas y hongos";
//            break;
//        case 11:
//            return "salsas";
//            break;
//        case 12:
//            return "postres";
//            break;
//    }
//}



