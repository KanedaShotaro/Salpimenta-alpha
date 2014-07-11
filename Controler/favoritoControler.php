<?php

Block::test();

$tipo = $_POST["tipo"];
$codigo = $_POST["id"];
$valor = $_POST["value"];

if ($tipo == "receta") {
    $codigoUsuario = $_SESSION["usuario"][0]->getCodigoUsuario();
    $usuarioBd = new UsuarioBd();
    $recetaBd = new RecetaBd();

    if ($valor == 1) {
        $usuarioBd->FavoritoRecetaUsuario($codigo, $codigoUsuario);
    } else {
        $usuarioBd->quitarFavoritoRecetaUsuario($codigo, $codigoUsuario);
    }
} else {
    $codigoUsuario = $_SESSION["usuario"][0]->getCodigoUsuario();
    $usuarioBd = new UsuarioBd();
    $blogBd = new BlogBd();

    if ($valor == 1) {
        $usuarioBd->FavoritoBlogUsuario($codigo, $codigoUsuario);
    } else {
        $usuarioBd->quitarFavoritoBlogUsuario($codigo, $codigoUsuario);
    }
}


