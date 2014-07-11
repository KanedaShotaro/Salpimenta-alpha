<?php

require './helpers.php';
/*Activar config.php para desarrollo*/
require './config.php';

include './Library/Block.php';
include './Library/Alert.php';
include './Library/AlertAction.php';
include './Library/Encryptar.php';
include './Library/Prevent.php';
include './Library/RecoverCat.php';



include './Model/BaseDatos.php';
include './Model/AbstractBD.php';
include './Model/RecetaBd.php';
include './Model/UsuarioBd.php';
include './Model/BlogBd.php';
include './Library/AbstractFun.php';
include './Library/Seccion.php';
include './Library/Usuario.php';
include './Library/Receta.php';
include './Library/Blog.php';
include './Library/View.php';
include './Library/Request.php';
include './Library/RecetaDetalle.php';
include './Library/Ajustes.php';
include './Library/RegistroReceta.php';
include './Library/RegistroUsuario.php';
include './Library/SeccionDetalle.php';
include './Library/SeccionBlogDetalle.php';
include './Library/RegistroBlog.php';
include './Library/Buscador.php';
include './Library/Perfil.php';




session_start();

if (Block::usuarioDup()) {
    AlertAction::create("warning", "Te has desconectado", "has iniciado sesión en otra parte.");
    $request = new Request("salirSesionControler");
    $request->execute();
} else {
    if (empty($_GET['url'])) {
        $url = '';
    } else {
        $url = $_GET['url'];
    }

    $request = new Request($url);
    $request->execute();
}





