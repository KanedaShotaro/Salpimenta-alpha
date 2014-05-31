<?php

class UsuarioBd extends AbstractBD {

    protected $bd;
    protected $ObjectDefault = "Usuario";

    function __construct() {
        $this->crearBd($this->bd);
    }

    function insertarUsuario($usuario) {
        $query1 = 'INSERT INTO USUARIO (EMAIL,CODUS,NOMUS,APUS1,APUS2,CLAVEUS,FECING,FECNAC,PLATFAV,MAXREC) VALUES("' . $usuario->getEmail() . '","' . $usuario->getCodigoUsuario() . '","' . $usuario->getNombre() . '","' . $usuario->getApellido1() . '","' . $usuario->getApellido2() . '","' . $usuario->getPassword() . '","' . $usuario->getFechaIngreso() . '","' . $usuario->getFechaNacimiento() . '","' . $usuario->getPlatoFavorito() . '","' . $usuario->getRecetasMax() . '");';
        $query2 = 'INSERT INTO IMGUS (ID, NOMIMG, IMG, TIPOIMG, CODUS) VALUES("0","' . $usuario->getNombreImg() . '","' . $usuario->getImagen() . '","' . $usuario->getTipoImg() . '","' . $usuario->getCodigoUsuario() . '");';
        return $this->insertQuery(array($query1, $query2));
    }

    function comprobarUsuario($email, $password) {
        /* Funcion para comprobar si el usuario se encuentra en la base de datos
         * devuelve true si existe, o false si no existe */

        $query = "SELECT CLAVEUS FROM USUARIO where EMAIL = '$email'; ";
        $resultado = $this->selectQuery($query);

        if ($resultado[0] == $password) {
            return true;
        } else {
            return false;
        }
    }

    function obtenerUsuario($email) {
        /* devuelve un array con los datos del usuario */
        $array_usuario = array();
        $query = 'SELECT * FROM USUARIO where EMAIL = "' . $email . '";';
        return $this->selectQuery($query, $this->getObjectDefault());
    }

    function recuperarAutorReceta($codigoReceta) {

        $query = 'SELECT U.* FROM USUARIO U, RECETA R where U.CODUS = R.CODUS and R.CODRE = "' . $codigoReceta . '" ; ';
        return $this->selectQuery($query, "Usuario");
    }

    function countRecetasUsuario($codigoUsuario) {
        $this->open();
        $query = 'SELECT count(*) FROM RECETA where CODUS = "' . $codigoUsuario . '" ;';
        return $this->selectQuery($query);
    }

    function updateUsuario($usuario) {

        $query1 = 'UPDATE USUARIO SET EMAIL = "' . $usuario->getEmail() . '", NOMUS = "' . $usuario->getNombre() . '", APUS1 = "' . $usuario->getApellido1() . '", APUS2 = "' . $usuario->getApellido2() . '", CLAVEUS = "' . $usuario->getPassword() . '", FECNAC = "' . $usuario->getFechaNacimiento() . '", PLATFAV = "' . $usuario->getPlatoFavorito() . '" WHERE CODUS = "' . $usuario->getCodigoUsuario() . '" ;';
        $query2 = 'UPDATE IMGUS SET NOMIMG = "' . $usuario->getNombreImg() . '", TIPOIMG = "' . $usuario->getTipoImg() . '", IMG = "' . $usuario->getImagen() . '" WHERE CODUS = "' . $usuario->getCodigoUsuario() . '" ;';
        $resultado = $this->updateQuery($query1);
        $resultado = $this->updateQuery($query2);
        return $resultado;
    }

    function getObjectDefault() {
        return $this->ObjectDefault;
    }

}
