<?php
Block::test();
$seccion = $_GET["seccion"];

if (empty($_GET['pagina'])) {
    $pagina = 1;
} else {
    $pagina = $_GET['pagina'];
}

$seccionDetalle = new SeccionDetalle($_GET["zona"], $seccion,$pagina);
$seccionDetalle->execute();
