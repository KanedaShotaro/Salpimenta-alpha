<?php

$recetaDetalle = new RecetaDetalle($_GET["urlReceta"], $_GET["seccion"],$_GET["zona"]);
$recetaDetalle->execute();


