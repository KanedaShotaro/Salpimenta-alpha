<?php
Block::test();
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

}