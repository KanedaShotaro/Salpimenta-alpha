<?php
Block::test();
if (isset($_GET["editar"])) {
    $editar = $_GET["editar"];
} else {
    $editar = "";
}

if (empty($_GET["zona"])) {
    $zona = "explora";
} else {
    $zona = $_GET["zona"];
}

$recetaDetalle = new RecetaDetalle($_GET["urlReceta"], $_GET["seccion"], $zona,$editar);
$recetaDetalle->execute();


