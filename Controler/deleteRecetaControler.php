<?php

if (empty($_GET['codigo'])) {
    $codigo = '';
} else {
    $codigo = $_GET['codigo'];
}

if (empty($_GET['nombre'])) {
    $nombre = '';
} else {
    $nombre = $_GET['nombre'];
}


if ($nombre == $_POST["borrar"]) {
    $recetaBd = new RecetaBd();
    $recetaBd->deleteReceta($codigo);
    AlertAction::create("success", "Exito", "Receta eliminada");
    $request = new Request("editarRecetasControler");
    $request->execute();
    
}else{
    echo "no borrado";
    AlertAction::create("info", "atención", "La receta no se ha borrado");
    $request = new Request("editarRecetasControler");
    $request->execute();
}
