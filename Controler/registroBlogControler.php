<?php

Block::test();

if (!empty($_POST["nombre"])) {

    $registroBlog = new RegistroBlog(
    array(
    "titulo" => $_POST["nombre"],
    "link" => $_POST["link"],
    "autor" => $_POST["autor"],
    "img" => $_FILES["img"],
    "descripcion" => $_POST["descripcion"],
    "codigoUsuario" => $_SESSION["usuario"][0]->getCodigoUsuario(),
    "categoria" => $_POST["tipoBlog"],
    "tags" => $_POST["tags"]
    )
    );
    $registroBlog->execute();
}