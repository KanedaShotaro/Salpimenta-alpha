<?php

if (!empty($_POST["nombre"])) {
    // creamos el objeto base de datos
    $Recetabd = new RecetaBd();
    // establecemos conexión
    //creamos el objeto Oferta con los datos
    $receta = new Receta();
    $receta->newReceta($_POST["nombre"], $_POST["autor"], $_POST["elaboracion"], $_POST["ingredientes"], $_POST["sugerencias"], $_POST["temporada"], $_POST["seccion"]);

    $nombre = $_FILES['img']['name'];
    $imagen_temporal = $_FILES['img']['tmp_name'];
    $type = $_FILES['img']['type'];
    //archivo temporal en binario
    $itmp = fopen($imagen_temporal, 'r+b');
    $imagen = fread($itmp, filesize($imagen_temporal));
    fclose($itmp);
    //escapando los caracteres
    $imagen = base64_encode($imagen);
    $imagen = mysql_real_escape_string($imagen);


    $receta->setImagen($imagen);
    $receta->setNombreImg($nombre);
    $receta->setTipoImg($type);

    $receta->setCodigoUsuario($_SESSION["usuario"][0]->getCodigoUsuario());


    if ($Recetabd->insertar_Receta($receta)) {
        if ($Recetabd->insertar_tags_receta($_POST["tags"], $receta->getCodigoReceta())) {
            //tuReceta='.$receta->getUrlReceta().'
            alerts("success", "Exito", "Tu receta a sido introducida!");
            $view = new View("seccionesView");
            $view->execute();
        } else {
            alerts("danger", "Error", "Oferta no introducida");
            $view = new View("seccionesView");
            $view->execute();
        }
    } else {
        alerts("danger", "Error", "Oferta no introducida");
        $view = new View("seccionesView");
        $view->execute();
    }
}