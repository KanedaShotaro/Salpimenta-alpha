<?php

if (!empty($_GET["form"])) {

    if (!empty($_FILES['img'])) {
        $imgNuevo = $_FILES['img'];
    } else {
        $imgNuevo = "";
    }

    if (!empty($_POST["nombre"])) {
        $nombreNuevo = $_POST["nombre"];
    } else {
        $nombreNuevo = $_SESSION["usuario"][0]->getNombre();
    }

    if (!empty($_POST["apellido1"])) {
        $apellido1Nuevo = $_POST["apellido1"];
    } else {
        $apellido1Nuevo = $_SESSION["usuario"][0]->getApellido1();
    }

    if (!empty($_POST["apellido2"])) {
        $apellido2Nuevo = $_POST["apellido2"];
    } else {
        $apellido2Nuevo = $_SESSION["usuario"][0]->getApellido2();
    }

    if (!empty($_POST["password"])) {
        $passwordNuevo = $_POST["password"];
    } else {
        $passwordNuevo = $_SESSION["usuario"][0]->getPassword();
    }

    if (!empty($_POST["email"])) {
        $emailNuevo = $_POST["email"];
    } else {
        $emailNuevo = $_SESSION["usuario"][0]->getEmail();
    }

    if (!empty($_POST["platoFav"])) {
        $platoFavNuevo = $_POST["platoFav"];
    } else {
        $platoFavNuevo = $_SESSION["usuario"][0]->getPlatoFavorito();
    }

    if (!empty($_POST["fecha"])) {
        $fechaNuevo = $_POST["fecha"];
    } else {
        $fechaNuevo = $_SESSION["usuario"][0]->getFechaNacimiento();
    }

    $ajustes = new Ajustes(array("img" => $imgNuevo, "nombre" => $nombreNuevo, "apellido1" => $apellido1Nuevo
            ,"apellido2" => $apellido2Nuevo, "password" => $passwordNuevo, "email" => $emailNuevo,"platoFav" => $platoFavNuevo
            ,"fechaNacimiento" => $fechaNuevo));
    $ajustes->execute();
} else {
    $view = new View("ajustesView");
    $view->execute();
}