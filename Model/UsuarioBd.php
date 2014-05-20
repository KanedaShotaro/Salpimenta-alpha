<?php

class UsuarioBd extends AbstractBD {

    protected $bd;

    function __construct() {
        $this->crearBd($this->bd);
    }

    function insertarUsuario($usuario) {
        $this->open();
        $query = 'INSERT INTO USUARIO (EMAIL,CODUS,NOMUS,APUS1,APUS2,CLAVEUS,FECING,FECNAC,PLATFAV,MAXREC) VALUES("' . $usuario->getEmail() . '","' . $usuario->getCodigoUsuario() . '","' . $usuario->getNombre() . '","' . $usuario->getApellido1() . '","' . $usuario->getApellido2() . '","' . $usuario->getPassword() . '","' . $usuario->getFechaIngreso() . '","' . $usuario->getFechaNacimiento() . '","' . $usuario->getPlatoFavorito() . '","' . $usuario->getRecetasMax() . '");';
        if ($resultado = $this->obtenerFilas($query)) {
            $this->close();
            return true;
        } else {
            $this->close();
            return false;
        }
    }

    function comprobarUsuario($email, $password) {
        $this->open();
        /* Funcion para comprobar si el usuario se encuentra en la base de datos
         * devuelve true si existe, o false si no existe */
        $query = "SELECT CLAVEUS FROM USUARIO where EMAIL = '$email'; ";
//$query = 'SELECT EMAILUS, CLAVEUS FROM USUARIO where EMAILUS = "' . $email . '" and CLAVEUS = "' . $password . '" ; ';
        if ($resultado = $this->obtenerFilas($query)) {
            while ($fila = $resultado->fetch_row()) {
                $passDesencriptado = Encryptar::decrypt($fila[0]);
                if ($password == $passDesencriptado) {
                     $this->close();
                return true;
                }
            }
        } else {
            $this->close();
            return false;
        }
    }

    function obtenerUsuario($email) {
        $this->open();
        /* devuelve un array con los datos del usuario */
        $array_usuario = array();
        $query = 'SELECT * FROM USUARIO where EMAIL = "' . $email . '";';

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

    function updateUsuario($usuario) {
        $this->open();
        $query = 'UPDATE USUARIO SET EMAIL = "' . $usuario->getEmail() . '", NOMUS = "' . $usuario->getNombre() . '", APUS1 = "' . $usuario->getApellido1() . '", APUS2 = "' . $usuario->getApellido2() . '", CLAVEUS = "' . $usuario->getPassword() . '", FECNAC = "' . $usuario->getFechaNacimiento() . '", PLATFAV = "' . $usuario->getPlatoFavorito() . '" WHERE CODUS = "' . $usuario->getCodigoUsuario() . '" ;';
        $actualizado = ($resultado = $this->obtenerFilas($query)) ? true : false;
        $query2 = 'INSERT INTO IMGUS (ID, NOMIMG, IMG, TIPOIMG, CODUS) VALUES("0","' . $usuario->getNombreImg() . '","' . $usuario->getImagen() . '","' . $usuario->getTipoImg() . '","' . $usuario->getCodigoUsuario() . '");';
        $insertado = ($resultado = $this->obtenerFilas($query2)) ? true : false;
        $this->close();
        return $actualizado;
    }

    function crearArrayUsuario($resultado) {
        $array_usuario = array();
        $i = 0;

        while ($fila = $resultado->fetch_row()) {
            $x = 0;

            $usuario = new Usuario();
            $usuario->setEmail(strtolower($fila[$x]));
            $x++;
            $usuario->setCodigoUsuario($fila[$x]);
            $x++;
            $usuario->setNombre(ucfirst(strtolower($fila[$x])));
            $x++;
            $usuario->setApellido1(ucfirst(strtolower($fila[$x])));
            $x++;
            $usuario->setApellido2(ucfirst(strtolower($fila[$x])));
            $x++;
            $usuario->setPassword(Encryptar::decrypt($fila[$x]));
            $x++;
            $usuario->setFechaNacimiento($fila[$x]);
            $x++;
            $usuario->setFechaIngreso($fila[$x]);
            $x++;
            $usuario->setPlatoFavorito(ucfirst(strtolower($fila[$x])));
            $x++;
            $usuario->setRecetasMax($fila[$x]);
            $x++;

            $array_usuario[$i] = $usuario;
            $i++;
        }
        return $array_usuario;
    }

}
