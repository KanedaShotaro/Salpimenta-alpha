<?php

Block::test();
$codigoReceta = $_POST["id"];
$valor = $_POST["value"];

$codigoUsuario = $_SESSION["usuario"][0]->getCodigoUsuario();
$usuarioBd = new UsuarioBd();
$recetaBd = new RecetaBd();

if ($valor == 1) {
    $usuarioBd->FavoritoRecetaUsuario($codigoReceta, $codigoUsuario);
}else{
    $usuarioBd->quitarFavoritoRecetaUsuario($codigoReceta, $codigoUsuario);
}

