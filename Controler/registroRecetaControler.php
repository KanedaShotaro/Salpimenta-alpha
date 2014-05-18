<?php

if (!empty($_POST["nombre"])) {

    $registroReceta = new RegistroReceta(
            array(
        "nombreReceta" => $_POST["nombre"],
        "autorReceta" => $_POST["autor"],
        "elaboracion" => $_POST["elaboracion"],
        "ingredientes" => $_POST["ingredientes"],
        "sugerencia" => $_POST["sugerencias"],
        "temporada" => $_POST["temporada"],
        "categoriaReceta" => $_POST["seccion"],
        "img" => $_FILES['img'],
        "tags" => $_POST["tags"]
    ));
    
    $registroReceta->execute();


//    $Recetabd = new RecetaBd();
//    $receta = new Receta();
//    $receta->newReceta($_POST["nombre"], $_POST["autor"], $_POST["elaboracion"], $_POST["ingredientes"], $_POST["sugerencias"], $_POST["temporada"], $_POST["seccion"],$_FILES['img']);
//    $receta->setCodigoUsuario($_SESSION["usuario"][0]->getCodigoUsuario());
//
//
//    if ($Recetabd->insertar_Receta($receta)) {
//        if ($Recetabd->insertar_tags_receta($_POST["tags"], $receta->getCodigoReceta())) {
//            alerts("success", "Exito", "Tu receta a sido introducida!");
//            $view = new View("seccionesView");
//            $view->execute();
//        } else {
//            alerts("danger", "Error", "Oferta no introducida");
//            $view = new View("seccionesView");
//            $view->execute();
//        }
//    } else {
//        alerts("danger", "Error", "Oferta no introducida");
//        $view = new View("seccionesView");
//        $view->execute();
//    }
}