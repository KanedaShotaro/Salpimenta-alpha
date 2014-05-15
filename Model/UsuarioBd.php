<?php

class UsuarioBd extends AbstractBD {

    protected $bd;

    function __construct() {
        $this->crearBd($this->bd);
    }

    function insertar_usuario($usuario) {
        $this->open();
        $query = 'INSERT INTO USUARIO (EMAIL,CODUS,NOMUS,APUS1,APUS2,CLAVEUS,FECING,FECNAC,PLATFAV,MAXREC) VALUES("' . $usuario->getEmail() . '","' . $usuario->getCodigoUsuario() . '","' . $usuario->getNombre() . '","' . $usuario->getApellido1() . '","' . $usuario->getApellido2() . '","' . $usuario->getPassword() . '","' . $usuario->getFechaIngreso() . '","' . $usuario->getFechaNacimiento() . '","' . $usuario->getPlatoFavorito() . '","' . $usuario->getRecetasMax() . '");';
        if ($resultado = $this->obtenerFilas($query)) {
            return true;
        } else {
            return false;
        }
        $resultado->close();
    }

    function comprobar_usuario($email, $password) {
        $this->open();
        /* Funcion para comprobar si el usuario se encuentra en la base de datos
         * devuelve true si existe, o false si no existe */
        $query = "SELECT EMAIL, CLAVEUS FROM USUARIO where EMAIL = '$email' and CLAVEUS = '$password' ; ";
//$query = 'SELECT EMAILUS, CLAVEUS FROM USUARIO where EMAILUS = "' . $email . '" and CLAVEUS = "' . $password . '" ; ';
        if ($resultado = $this->obtenerFilas($query)) {
            while ($fila = $resultado->fetch_row()) {
                $this->close();
                return true;
            }
        } else {
            $this->close();
            return false;
        }
    }

    function obtener_usuario($email, $password) {
        $this->open();
        /* devuelve un array con los datos del usuario */
        $array_usuario = array();
        $query = 'SELECT * FROM USUARIO where EMAIL = "' . $email . '" and CLAVEUS = "' . $password . '" ; ';

        if ($resultado = $this->obtenerFilas($query)) {
            $array_usuario = $this->crearArrayUsuario($resultado);
            $this->close();
            return $array_usuario;
        } else {
            $this->close();
            return $array_usuario;
        }
    }
    
    function recuperarAutorReceta($codigoReceta) {
        $this->open();
        $query = 'SELECT * FROM USUARIO U, RECETA R where U.CODUS = R.CODUS and R.CODRE = "' . $codigoReceta . '" ; ';

        if ($resultado = $this->obtenerFilas($query)) {
            $array_usuario = $this->crearArrayUsuario($resultado);
            $this->close();
            return $array_usuario;
        } else {
            $this->close();
            return $array_usuario;
        }
    }

    function countRecetasUsuario($codigoUsuario) {
        $this->open();
        $query = 'SELECT count(*) FROM RECETA where CODUS = "' . $codigoUsuario . '" ;';
        if ($resultado = $this->obtenerFilas($query)) {
            while ($fila = $resultado->fetch_row()) {
                $FilasRecetas = $fila;
            }
        }
        $this->close();
        return $FilasRecetas;
    }
    
    function crearArrayUsuario($resultado) {
    $array_usuario = array();
    $i = 0;

    while ($fila = $resultado->fetch_row()) {
        $x = 0;
        
        $usuario = new Usuario();
        $usuario->setEmail($fila[$x]);
        $x++;
        $usuario->setCodigoUsuario($fila[$x]);
        $x++;
        $usuario->setNombre($fila[$x]);
        $x++;
        $usuario->setApellido1($fila[$x]);
        $x++;
        $usuario->setApellido2($fila[$x]);
        $x++;
        $usuario->setPassword($fila[$x]);
        $x++;
        $usuario->setFechaNacimiento($fila[$x]);
        $x++;
        $usuario->setFechaIngreso($fila[$x]);
        $x++;
        $usuario->setPlatoFavorito($fila[$x]);
        $x++;
        $usuario->setRecetasMax($fila[$x]);
        $x++;

        $array_usuario[$i] = $usuario;
        $i++;
    }
    return $array_usuario;
}

}
