<?php

if (isset($_GET["editar"])) {
    $editar = $_GET["editar"];
} else {
    $editar = "";
}

$recetaDetalle = new RecetaDetalle($_GET["urlReceta"], $_GET["seccion"], $_GET["zona"],$editar);
$recetaDetalle->execute();


