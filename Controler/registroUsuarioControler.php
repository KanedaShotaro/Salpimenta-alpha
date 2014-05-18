<?php

if (!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["nombre"])) {

    $registroUsuario = new Registrousuario(
            array(
        "nombre" => $_POST["nombre"],
        "apellido1" => $_POST["apellido1"],
        "apellido2" => $_POST["apellido2"],
        "password" => $_POST["password"],
        "email" => $_POST["email"],
        "fechaNacimiento" => $_POST["fecha"],
        "platoFavorito" => $_POST["platoFav"]
    ));
    
    $registroUsuario->execute();
    
} else {
    alerts("info", "Atencion", "Rellena todos los campos");
} $view = new View("registroUsuarioView");
$view->execute();
