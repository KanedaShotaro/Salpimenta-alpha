<?php
Block::test();
$permitidos = 5;
$tiempo = 20;
$prevent = new Prevent($tiempo, $permitidos);

if ($prevent->tiempoRestante() != 0) {
    AlertAction::create("danger", "STOP", 'Debes esperar ' . $prevent->tiempoRestante() . ' segundos para poder intentar el login de nuevo');
    $request = new Request("");
    $request->execute();
} else {
    if ($prevent->sumarIntento()) {
        if (!empty($_POST["email"]) && !empty($_POST["password"])) {

            $email = strtoupper($_POST["email"]);
            $password = $_POST["password"];
            $usuarioBd = new UsuarioBd();

            if ($usuarioBd->comprobarUsuario($email, $password)) {
                $prevent->borrarSesiones();
                $_SESSION['usuario'] = $usuarioBd->obtenerUsuario($_POST["email"]);
                AlertAction::create("success", 'Bienvenido a SALPIMENTA ', ' ' . $_SESSION["usuario"][0]->getNombre() . '');
                $request = new Request("");
                $request->execute();
            } else {
                AlertAction::create("warning", 'OOPS!', 'has ingresado mal los datos, te quedan '.($permitidos - $_SESSION["intentos"]) .' Intentos');
                $request = new Request("");
                $request->execute();
            }
        } else {
            AlertAction::create("warning", 'Campos vacios', 'Rellena todos los campos, te quedan '.$_SESSION["intentos"].' Intentos');
            $request = new Request("");
            $request->execute();
        }
    } else {
        AlertAction::create("danger", 'OOPS!', 'has excedido los intentos tendras que esperar 20 segundos para logearte de nuevo!');
        $request = new Request("");
        $request->execute();
    }
}



