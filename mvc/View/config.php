<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

function view($template, $var = array()) {
    extract($var);
    require ''.$template.'.php';
}

view("mi-salpimenta",['saludo' => $saludo]);


file_exists($filename);

// front-end controler