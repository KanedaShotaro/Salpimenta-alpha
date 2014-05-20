<?php

$seccion = $_GET["seccion"];

if (empty($_GET["zona"])) {
    $zona = "explora";
} else {
    $zona = $_GET["zona"];
}


$seccionDetalle = new SeccionDetalle($zona, $seccion);
$seccionDetalle->execute();
