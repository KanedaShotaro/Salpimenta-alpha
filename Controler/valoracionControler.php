<?php

Block::test();


$tipo = $_POST["tipo"];
$codigo = $_POST["id"];
$valor = $_POST["value"];

if ($tipo == "receta") {
    $codigoUsuario = $_SESSION["usuario"][0]->getCodigoUsuario();
    $usuarioBd = new UsuarioBd();
    $recetaBd = new RecetaBd();
    $usuarioBd->valoracionRecetaUsuario($codigo, $codigoUsuario, $valor);
    $recetaBd->actualizarValoracion($codigo);
} else {
    $codigoUsuario = $_SESSION["usuario"][0]->getCodigoUsuario();
    $usuarioBd = new UsuarioBd();
    $blogBd = new BlogBd();
    $usuarioBd->valoracionBlogUsuario($codigo, $codigoUsuario, $valor);
    $blogBd->actualizarValoracion($codigo);
}







