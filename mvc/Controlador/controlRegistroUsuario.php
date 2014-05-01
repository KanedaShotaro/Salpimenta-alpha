<?php
echo "controlRegistroUsuario/";
session_start();
//include '/var/www/DescuentingBeta1/mvc/Vista/funcionesVista.php';
include '/var/www/Salpimenta-backend/mvc/Modelo/BaseDatos.php';
include '/var/www/Salpimenta-backend/mvc/Modelo/Usuario.php';


if (!empty($_POST[email]) && !empty($_POST[password]) && !empty($_POST[nombre])) {
    // creamos el objeto base de datos
    $bd = poolBBDD();
    // establecemos conexión
    if ($bd->establecer_conexion()) {
        echo "conexion establecida <br/>";
        //creamos el objeto Usuario con los datos

        $usuario = new Usuario($_POST[nombre], $_POST[apellido1], $_POST[apellido2], $_POST[password],$_POST[email], $_POST[fecha], $_POST[platoFav]);
        
        if ($bd->insertar_usuario($usuario)) {
            $_SESSION[usuario][0] = $usuario;
            header("Location: /Salpimenta-backend/mvc/Vista/mi-salpimenta.php");
        } else {
           echo "Usuario no introducido";
        }
    } else {
        echo "fallo en la conexión";
    }
}else{
    echo "nada introducido";
}