<?php
Block::test();

if (!empty($_POST["nombre"])) {
       
    $registroReceta = new RegistroReceta(
            array(
        "nombreReceta" => $_POST["nombre"],
        "autorReceta" => $_SESSION["usuario"][0]->getNombre(),
        "elaboracion" => $_POST["elaboracion"],
        "ingredientes" => $_POST["ingredientes"],
        "sugerencia" => $_POST["sugerencias"],
        "temporada" => $_POST["temporada"],
        "categoriaReceta" => RecoverCat::numeroSeccionIdent($_POST["seccion"]),
        "img" => array(
                    name  => $_POST["name"],
                    type => $_POST["type"],
                    tmp_name => $_POST["img"],
                ),
        "tags" => $_POST["tags"]
    ));
    
    print_r($_POST);
    exit;
    
    //$registroReceta->execute();

}


