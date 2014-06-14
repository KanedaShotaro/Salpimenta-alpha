<?php
Block::test();
$seccion = $_GET["seccion"];

//if (empty($_GET["zona"])) {
//    $zona = "explora";
//} else {
//    $zona = "";
//}


$seccionDetalle = new SeccionDetalle($_GET["zona"], $seccion);
$seccionDetalle->execute();
