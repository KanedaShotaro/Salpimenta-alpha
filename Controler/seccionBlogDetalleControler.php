<?php

$seccion = $_GET["seccion"];
 $zona = $_GET["zona"];

$seccionDetalle = new SeccionDetalle($zona, $seccion);
$seccionDetalle->execute();

