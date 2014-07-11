<?php

function varDum($var) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function activarSeccion($seccion) {
    $activoArray = array();

    switch ($seccion) {
        case "aperitivos":
            $activoArray[0] = "activo-menu";
            break;
        case "ensaladas-y-verduras":
            $activoArray[1] = "activo-menu";
            break;
        case "arroces-y-cereales":
            $activoArray[2] = "activo-menu";
            break;
        case "sopas-y-cremas":
            $activoArray[3] = "activo-menu";
            break;
        case "pastas-y-pizzas":
            $activoArray[4] = "activo-menu";
            break;
        case "legumbres":
            $activoArray[5] = "activo-menu";
            break;
        case "carnes":
            $activoArray[6] = "activo-menu";
            break;
        case "pescados-y-mariscos":
            $activoArray[7] = "activo-menu";
            break;
        case "huevos":
            $activoArray[8] = "activo-menu";
            break;
        case "setas-y-hongos":
            $activoArray[9] = "activo-menu";
            break;
        case "salsas":
            $activoArray[10] = "activo-menu";
            break;
        case "postres":
            $activoArray[11] = "activo-menu";
            break;
    }

    return $activoArray;
}

function sanearString($string) {

    $string = trim($string);
    $string = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string);
    $string = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string);
    $string = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string);
    $string = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string);
    $string = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string);
    $string = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C',), $string);
    $string = str_replace(array("\\", "¨", "º", "~", "*", "#", "@", "|", "!", "\"", "-", "·", "$", "%", "&", "/", "(", ")", "?", "'", "¡",
        "¿", "[", "^", "`", "]", "+", "}", "{", "¨", "´", ">", "< ", ";", ",", ":", "."), '', $string);
    return strtolower($string);
}
