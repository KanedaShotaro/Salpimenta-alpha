<?php

echo "BaseDatos/";
require_once '/var/www/Salpimenta-backend/mvc/Modelo/funcionesModelo.php';

class BaseDatos {

    private $host;
    private $user;
    private $pass;
    private $bd;
    private $conexion;

    function __construct($host, $user, $pass, $bd) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->bd = $bd;
    }

    function establecer_conexion() {
        /* función para establecer la Conexion con la base de datos, devuelve true si a sido correcta, false si no */
        $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->bd);

        if ($this->conexion->connect_errno) {
            return false;
        } else {
            return true;
        }
    }
    
    function insertar_usuario($usuario) {
        /* funcion para insertar usuario en la base de datos
         * la funcion devuelve true si se ha insertado correctamente o false 
         * si no se ha insertado correctamente
         */
        $query = 'INSERT INTO USUARIO (EMAIL,CODUS,NOMUS,APUS1,APUS2,CLAVEUS,FECING,FECNAC,PLATFAV,MAXREC) VALUES("' . $usuario->getEmail() . '","' . $usuario->getCodigoUsuario() . '","' . $usuario->getNombre() . '","' . $usuario->getApellido1() . '","' . $usuario->getApellido2() . '","' . $usuario->getPassword() . '","' . $usuario->getFechaIngreso() . '","' . $usuario->getFechaNacimiento() . '","' . $usuario->getPlatoFavorito() . '","' . $usuario->getRecetasMax() . '");';
        if ($resultado = $this->conexion->query($query)) {
            return true;
        } else {
            return false;
        }
        $resultado->close();
    }
    
    function comprobar_usuario($email, $password) {
        /* Funcion para comprobar si el usuario se encuentra en la base de datos
         * devuelve true si existe, o false si no existe */
        $query = "SELECT EMAIL, CLAVEUS FROM USUARIO where EMAIL = '$email' and CLAVEUS = '$password' ; ";
//$query = 'SELECT EMAILUS, CLAVEUS FROM USUARIO where EMAILUS = "' . $email . '" and CLAVEUS = "' . $password . '" ; ';
        if ($resultado = $this->conexion->query($query)) {
            while ($fila = $resultado->fetch_row()) {
                return true;
            }
        } else {
            return false;
        }
        $resultado->close();
    }
    
    function obtener_usuario($email, $password) {
        /* devuelve un array con los datos del usuario */
        $array_usuario = array();
        $query = 'SELECT * FROM USUARIO where EMAIL = "' . $email . '" and CLAVEUS = "' . $password . '" ; ';

        if ($resultado = $this->conexion->query($query)) {
            $array_usuario = crearArrayUsuario($resultado);
            return $array_usuario;
        } else {
            echo "no ha entrado";
            return $array_usuario;
        }

        $resultado->close();
    }

}
