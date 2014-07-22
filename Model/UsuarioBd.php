<?php

class UsuarioBd extends AbstractBD {

    protected $bd;
    protected $ObjectDefault = "Usuario";

    function __construct() {
        $this->crearBd($this->bd);
    }

    function insertarUsuario($usuario) {
        $query1 = 'INSERT INTO USUARIO (EMAIL,CODUS,NOMUS,APUS1,APUS2,CLAVEUS,FECING,FECNAC,PLATFAV,MAXREC,IDSES) VALUES("' . $usuario->getEmail() . '","' . $usuario->getCodigoUsuario() . '","' . $usuario->getNombre() . '","' . $usuario->getApellido1() . '","' . $usuario->getApellido2() . '","' . $usuario->getPassword() . '","' . $usuario->getFechaIngreso() . '","' . $usuario->getFechaNacimiento() . '","' . $usuario->getPlatoFavorito() . '","' . $usuario->getRecetasMax() . '","' . session_id() . '");';
        $query2 = 'INSERT INTO IMGUS (ID, NOMIMG, IMG, TIPOIMG, CODUS) VALUES("0","' . $usuario->getNombreImg() . '","' . $usuario->getImagen() . '","' . $usuario->getTipoImg() . '","' . $usuario->getCodigoUsuario() . '");';
        return $this->insertQuery(array($query1, $query2));
    }

    function comprobarUsuario($email, $password) {
        /* Funcion para comprobar si el usuario se encuentra en la base de datos
         * devuelve true si existe, o false si no existe */
        $query = "SELECT CLAVEUS FROM USUARIO where EMAIL = '$email'; ";
        $resultado = $this->selectQuery($query);
        if (!empty($resultado)) {
            $passDecrypt = Encryptar::decrypt($resultado[0]);
        }else{
            $passDecrypt = null;
        }
        if ($passDecrypt == $password) {
            return true;
        } else {
            return false;
        }
    }

    function obtenerUsuario($email) {
        /* devuelve un array con los datos del usuario */
        $query = 'SELECT U.*,M.NOMIMG,M.IMG,M.TIPOIMG FROM USUARIO U, IMGUS M WHERE U.CODUS = M.CODUS AND U.EMAIL = "' . $email . '";';
        $query2 = 'UPDATE USUARIO SET IDSES = "' . session_id() . '" WHERE EMAIL = "' . $email . '" ;';
        if ($this->updateQuery($query2)) {
            return $this->selectQuery($query, $this->getObjectDefault());
        } else {
            return false;
        }
    }

    function recuperarAutorReceta($codigoReceta) {

        $query = 'SELECT U.*,M.NOMIMG,M.IMG,M.TIPOIMG FROM USUARIO U, RECETA R,IMGUS M WHERE U.CODUS = M.CODUS AND M.CODUS = R.CODUS AND R.CODRE = "' . $codigoReceta . '" ; ';
        return $this->selectQuery($query, "Usuario");
    }

    function countRecetasUsuario($codigoUsuario) {
        $query = 'SELECT count(*) FROM RECETA where CODUS = "' . $codigoUsuario . '" ;';
        return $this->selectQuery($query);
    }

    function valoracionRecetaUsuario($codReceta, $codUsuario, $valoracion) {

        if ($this->comprobarValoracionRecetaUsuario($codReceta, $codUsuario)) {
            $query = 'UPDATE VALORUS SET VALUS = "' . $valoracion . '" WHERE CODUS = "' . $codUsuario . '" AND CODRE = "' . $codReceta . '";';
            return $this->updateQuery($query);
        } else {
            $query = 'INSERT INTO VALORUS (CODRE,CODUS,VALUS) VALUES("' . $codReceta . '","' . $codUsuario . '","' . $valoracion . '");';
            return $this->insertQuery(array($query));
        }
    }

    function valoracionBlogUsuario($codigoBlog, $codUsuario, $valoracion) {

        if ($this->comprobarValoracionBlogUsuario($codigoBlog, $codUsuario)) {
            $query = 'UPDATE VALUSBLO SET VALUS = "' . $valoracion . '" WHERE CODUS = "' . $codUsuario . '" AND CODBLOG = "' . $codigoBlog . '";';
            return $this->updateQuery($query);
        } else {
            $query = 'INSERT INTO VALUSBLO (CODBLOG,CODUS,VALUS) VALUES("' . $codigoBlog . '","' . $codUsuario . '","' . $valoracion . '");';
            return $this->insertQuery(array($query));
        }
    }

    function comprobarValoracionBlogUsuario($codigoBlog, $codUsuario) {
        $query = 'SELECT * FROM VALUSBLO WHERE CODBLOG = "' . $codigoBlog . '" AND CODUS = "' . $codUsuario . '";';
        $resultado = $this->selectQuery($query);
        return count($resultado) > 0 ? true : false;
    }

    function favoritoRecetaUsuario($codReceta, $codUsuario) {
        if (!$this->comprobarFavoritoRecetaUsuario($codReceta, $codUsuario)) {
            $query = 'INSERT INTO RECFAV (CODRE,CODUS) VALUES("' . $codReceta . '","' . $codUsuario . '");';
            return $this->insertQuery(array($query));
        }
    }

    function favoritoBlogUsuario($codBlog, $codUsuario) {
        if (!$this->comprobarFavoritoBlogUsuario($codBlog, $codUsuario)) {
            $query = 'INSERT INTO BLOGFAV (CODBLOG,CODUS) VALUES("' . $codBlog . '","' . $codUsuario . '");';
            return $this->insertQuery(array($query));
        }
    }

    function quitarfavoritoRecetaUsuario($codReceta, $codUsuario) {
        $query = 'DELETE FROM RECFAV WHERE CODRE = "' . $codReceta . '" AND CODUS = "' . $codUsuario . '" ;';
        return $this->deleteQuery($query);
    }
    
    function quitarfavoritoBlogUsuario($codBlog, $codUsuario) {
        $query = 'DELETE FROM BLOGFAV WHERE CODBLOG = "' . $codBlog . '" AND CODUS = "' . $codUsuario . '" ;';
        return $this->deleteQuery($query);
    }

    function comprobarValoracionRecetaUsuario($codReceta, $codUsuario) {
        $query = 'SELECT * FROM VALORUS WHERE CODRE = "' . $codReceta . '" AND CODUS = "' . $codUsuario . '";';
        $resultado = $this->selectQuery($query);
        return count($resultado) > 0 ? true : false;
    }

    function comprobarFavoritoBlogUsuario($codigo, $codigoUsuario) {
        $query = 'SELECT * FROM BLOGFAV WHERE CODBLOG = "' . $codigo . '" AND CODUS = "' . $codigoUsuario . '";';
        $resultado = $this->selectQuery($query);
        return count($resultado) > 0 ? true : false;
    }

    function comprobarFavoritoRecetaUsuario($codigo, $codigoUsuario) {
        $query = 'SELECT * FROM FAVRE WHERE CODRE = "' . $codigo . '" AND CODUS = "' . $codigoUsuario . '";';
        $resultado = $this->selectQuery($query);
        return count($resultado) > 0 ? true : false;
    }

    function updateUsuario($usuario) {

        $query1 = 'UPDATE USUARIO SET EMAIL = "' . $usuario->getEmail() . '", NOMUS = "' . $usuario->getNombre() . '", APUS1 = "' . $usuario->getApellido1() . '", APUS2 = "' . $usuario->getApellido2() . '", CLAVEUS = "' . $usuario->getPassword() . '", FECNAC = "' . $usuario->getFechaNacimiento() . '", PLATFAV = "' . $usuario->getPlatoFavorito() . '" WHERE CODUS = "' . $usuario->getCodigoUsuario() . '" ;';
        $query2 = 'UPDATE IMGUS SET NOMIMG = "' . $usuario->getNombreImg() . '", TIPOIMG = "' . $usuario->getTipoImg() . '", IMG = "' . $usuario->getImagen() . '" WHERE CODUS = "' . $usuario->getCodigoUsuario() . '" ;';
        $resultado = $this->updateQuery($query1);
        $resultado = $this->updateQuery($query2);
        return $resultado;
    }

    function obtenerIdUsuario($email) {
        $email = strtoupper($email);
        $query = 'SELECT IDSES FROM USUARIO WHERE EMAIL = "' . $email . '" ; ';
        $resultado = $this->selectQuery($query);
        return $resultado[0];
    }

    function recuperarSeccionesUsuario($codigoUsuario) {
        $query = 'SELECT DISTINCT S.CATREC FROM SECREC S, USUARIO U, RECFAV F WHERE S.CODRE = F.CODRE AND F.CODUS = U.CODUS AND U.CODUS = "' . $codigoUsuario . '" ORDER BY S.CATREC; ';
        $resultado = $this->selectQuery($query);
        return $resultado;
    }

    function getObjectDefault() {
        return $this->ObjectDefault;
    }

}
