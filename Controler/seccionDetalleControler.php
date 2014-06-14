<?php
Block::test();
$seccion = $_GET["seccion"];

if (empty($_GET["zona"])) {
    $zona = "explora";
} else {
    $zona = "Mi Salpimenta";
}


$seccionDetalle = new SeccionDetalle($zona, $seccion);
$seccionDetalle->execute();
