<?php
Block::test();
include_once '/Library/Alert.php';
include_once '/Library/NewAlert.php';

if (!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["nombre"])) {

    $registroUsuario = new Registrousuario(
            array(
        "nombre" => $_POST["nombre"],
        "apellido1" => $_POST["apellido1"],
        "apellido2" => $_POST["apellido2"],
        "password" => Encryptar::encrypt($_POST["password"]),
        "email" => $_POST["email"],
        "fechaNacimiento" => $_POST["fecha"],
        "platoFavorito" => $_POST["platoFav"],
        "img" => $_FILES["img"],
    ));
    $registroUsuario->execute();
} else {
    AlertAction::create("info", "Atencion", "Rellena todos los campos");
    include "/View/registroUsuarioView.php";
}
