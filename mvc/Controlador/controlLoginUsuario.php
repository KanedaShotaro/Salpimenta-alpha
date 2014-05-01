<?php
echo "controlLoginUsuario/";
session_start(); // sesion para el nombre de empresa
include '/var/www/Salpimenta-backend/mvc/Modelo/Usuario.php';
include '/var/www/Salpimenta-backend/mvc/Modelo/BaseDatos.php';




?>

<html>
    
    <body>
        <?php
//PRIMERO VERIFICAMOS SI PUEDE SEGUIR LOGUEANDOSE O DEBE ESPERAR ALGUN TIEMPO
        $permitidos = 3;
        $tiempo = 20;
        if (isset($_SESSION['tiempo_fuera'])) {//Si estas fuera de tiempo de logeo
            //Comprobamos cuanto tiempo ha pasado:
            $tiempo_ahora = time() - $_SESSION['tiempo_fuera'];
            if ($tiempo_ahora < $tiempo) {
                $tiempo_restante = $tiempo - $tiempo_ahora;
                // ESTO SI NO PUEDE LOGUEARSE
                die('Debes esperar ' . $tiempo_restante . ' segundos para poder intentar el login de nuevo <br /><br /><a href="controlLoginUsuario.php">Recargar pagina</a>');
            } else {
                unset($_SESSION['tiempo_fuera']); //si ha cumplido el tiempo_fuera, destruimos la sesion.
            }
        }


        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // ESTO ES TODO LO QUE SE HARA AL ENVIAR EL FORMULARIO
            // LUEGO VEMOS CUANTOS INTENTOS VA
            if (!isset($_SESSION['intentos'])) {
                $intentos = 0;
                $_SESSION['intentos'] = $intentos;
            } else {
                $intentos = $_SESSION['intentos'];
            }
            // LUEGO COMPARAMOS CON EL NUMERO DE INTENTOS PERMITIDOS
            if ($intentos >= $permitidos) { //Si ha sobrepasado el numero de intentos
                unset($_SESSION['intentos']); //destruimos la variable de intentos
                $_SESSION['tiempo_fuera'] = time(); // Creamos la variable del tiempo en el que va a estar fuera de logeo
                die('Debes esperar ' . $tiempo_restante . ' segundos para poder intentar el login de nuevo <br /><br /><a href="controlLogin.php">Recargar pagina</a>');
            } else { //Si no ha sobre pasado el numereo de intentos
                $intentos++;
                $bd = poolBBDD();
                if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                    $email = strtoupper($_POST['email']);            
                    $password = strtoupper($_POST['password']);
                    if ($bd ->establecer_conexion()) {
                        
                        if ($bd ->comprobar_usuario($email, $password)) {
                            //Borramos las variables de session de intentos y tiempo  y redirigir a la bienvenida
                            unset($_SESSION['tiempo_fuera'], $_SESSION['intentos']);
                            echo "ola ke ase";
                            $_SESSION[usuario] = $bd->obtener_usuario($email, $password);
                            header("Location: /Salpimenta-backend/mvc/Vista/mi-salpimenta.php");
                            //die("Login correcto");
                        } else {
                            $_SESSION['intentos'] = $intentos;
                            //alert("danger", "Error", "El usuario o la clave son incorrectos Intentalo Otra vez");
                            //alert("info", "INFO", "Llevas " . $intentos . " Intentos");
                            //form_login();
                        }
                    }
                } else {
                    //form_login();
                }
            }
        } else {
            //form_login();
        }
        ?>

    </body>
</html>
