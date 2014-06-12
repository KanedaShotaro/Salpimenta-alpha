<?php
Block::test();
$codigoReceta = $_POST["id"];
$valor = $_POST["value"];
//$prevent = new Prevent(300);

//if (!isset($_SESSION["codigoReceta"])) {
//    $_SESSION["codigoReceta"] = $codigoReceta;
//} else {
//    if ($_SESSION["codigoReceta"] != $codigoReceta) {
//        $prevent->borrarSesiones();
//        $prevent->borrarIntentosSession();
//        unset($_SESSION["codigoReceta"]);
//    }
//}

//if ($prevent->tiempoRestante() == 0) {

//    if (isset($_SESSION["usuario"])) {
        $codigoUsuario = $_SESSION["usuario"][0]->getCodigoUsuario();
        $usuarioBd = new UsuarioBd();
        $recetaBd = new RecetaBd();
        $usuarioBd->valoracionUsuario($codigoReceta, $codigoUsuario, $valor);
        $recetaBd->actualizarValoracion($codigoReceta);
//        $prevent->activarTiempoTranscurrido();
//    } else {
//        echo "usuario no registrado";
//    }
//} else {
//    echo "bloqueado";
//}



        
