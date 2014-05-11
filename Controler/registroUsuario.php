<?php

echo "RegistroUsuario/";

if (!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["nombre"])) {
    // creamos el objeto base de datos
    $bd = poolBBDD();
    // establecemos conexión
    if ($bd->establecer_conexion()) {
        echo "conexion establecida <br/>";
        //creamos el objeto Usuario con los datos
        $usuario = new Usuario();
        $usuario->newUsuario($_POST["nombre"], $_POST["apellido1"], $_POST["apellido2"], $_POST["password"], $_POST["email"], $_POST["fecha"], $_POST["platoFav"]);
        if ($bd->insertar_usuario($usuario)) {
            $_SESSION['usuario'][0] = $usuario;
            header("Location: /Salpimenta-backend/index.php");
        } else {
            alerts("danger", "Error", "Usuario no introducido");
            header("Location: /Salpimenta-backend/index.php");
        }
    } else {
        alerts("danger", "Error", "fallo en la conexión");
        header("Location: /Salpimenta-backend/index.php");
    }
} else {
    alerts("info", "Atencion", "Rellena todos los campos");
    $view = new View("registroUsuarioView");
    $view->execute();
}