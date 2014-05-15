<?php

function contadorOfertasUsuario() {
    $RecetaBd = new RecetaBd();

    $usuario = $_SESSION["usuario"][0];
    $recetasSubidas = $RecetaBd->countRecetasUsuario($usuario->getCodigoUsuario());
    return $recetasSubidas[0];
}

if (contadorOfertasUsuario() >= $_SESSION["usuario"][0]->getRecetasMax()) {
    alerts("danger", "Alto!", "As excedido tu numero maximo de recetas, invita a un amigo y conseguiras 5 recetas màs!");
    $view = new View("seccionesView");
    $view->execute();
} else {
    include '/var/www/Salpimenta-backend/View/registroRecetaView.php';
}



