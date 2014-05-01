<?php
echo "funcionesControlador/";

function gen_chars_no_dup($long = 25) {
    /* Funcion que crea un codigo unico de 25 caracteres de longitud*/
    $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    mt_srand((double) microtime() * 1000000);
    $i = 0;
    while ($i != $long) {
        $rand = mt_rand() % strlen($chars);
        $tmp = $chars[$rand];
        $pass = $pass . $tmp;
        $chars = str_replace($tmp, "", $chars);
        $i++;
    }
    return strrev($pass);
}

function gen_chars_no_dup5($long = 5) {
    /* Funcion que crea un codigo unico de 5 caracteres de longitud*/
    $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    mt_srand((double) microtime() * 1000000);
    $i = 0;
    while ($i != $long) {
        $rand = mt_rand() % strlen($chars);
        $tmp = $chars[$rand];
        $pass = $pass . $tmp;
        $chars = str_replace($tmp, "", $chars);
        $i++;
    }
    return strrev($pass);
}

function convertirFechaAMysql($fecha) {
    /*Convierte la fecha pasada a formato Mysql*/
    if ($fecha != null) {
        $objetoFecha = DateTime::createFromFormat("d/m/Y", $fecha);
    $fecha = $objetoFecha->format("Y-m-d");
    return $fecha;
    }else{
        return $fecha;
    }
}

function crearUrlUnica($nombre) {
    /* genera una Url de 5 caracteres unica, asociada al nombre de la oferta*/
    $nombreString = explode(' ', $nombre);
    $url = implode("-", $nombreString);
    $codigo = gen_chars_no_dup5($long = 5);
    $url .= "/" . $codigo;
    return $url;
}