<?php

echo "BaseDatos/";
require_once '/var/www/Salpimenta-backend/mvc/Model/funcionesModelo.php';

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

    /* Funciones receta**** */

    function insertar_receta($receta) {

        /* Funcion para insertar una receta en la base de datos */
        $query = 'INSERT INTO RECETA (CODRE,NOMRE,AUTORE,ELABRE,INGRE,SUGER,VALRE,TEMRE,URL,FECHEN) VALUES("' . $receta->getCodigoReceta() . '","' . $receta->getNombreReceta() . '","' . $receta->getAutorReceta() . '","' . htmlspecialchars($receta->getElaboracion()) . '","' . htmlspecialchars($receta->getIngredientes()) . '","' . htmlspecialchars($receta->getSugerencia()) . '","' . $receta->getValoracion() . '","' . $receta->getTemporada() . '","' . $receta->getUrlReceta() . '","' . $receta->getFechaEntrada() . '");';
        $insertado = ($resultado = $this->conexion->query($query)) ? true : false;
        if (!$insertado) {
            echo "<pre>";
            echo "query receta".$this->conexion->error;
            echo "</pre>";
        }
        $query2 = 'INSERT INTO SECREC (CATREC,CODRE) VALUES ("' . $receta->getCategoriaReceta() . '","' . $receta->getCodigoReceta() . '");';
        $insertado = ($resultado = $this->conexion->query($query2)) ? true : false;
        if (!$insertado) {
            echo "<pre>";
            echo "query seccion".$this->conexion->error;
            echo "</pre>";
        }
        $query3 = 'INSERT INTO IMGRE (ID, NOMIMG, IMG, TIPOIMG, CODRE) VALUES("0","' . $receta->getNombreImg() . '","' . $receta->getImagen() . '","' . $receta->getTipoImg() . '","' . $receta->getCodigoReceta() . '");';
        $insertado = ($resultado = $this->conexion->query($query3)) ? true : false;
        if (!$insertado) {
            echo "<pre>";
            echo "query imagen".$this->conexion->error;
            echo "</pre>";
        }
        return $insertado;
    }

    function insertar_tags_receta($tags, $codigoReceta) {
        // Esta funcion inserta tags relacionados con un codigo de Receta en la BBDD
        $array_tags = explode(' ', $tags);
        for ($x = 0; $x < count($array_tags); $x++) {
            $query = 'INSERT INTO TAGRE (CODRE, NOMTAG) VALUES ("' . $codigoReceta . '","' . $array_tags[$x] . '");';
            $insertado = ($resultado = $this->conexion->query($query)) ? true : false;
        }
        return $insertado;
    }

    function recuperar_receta_seccion($seccion) {
        /* funcion para recuperar una receta de la base de datos buscando por seccion */
        $array_recetas = array();
        $query = 'SELECT R.*, M.NOMIMG, M.IMG, M.TIPOIMG, S.CATREC FROM RECETA R, SECREC S, IMGRE M WHERE R.CODRE = S.CODRE AND S.CODRE = M.CODRE AND S.CATREC = "' . $seccion . '" ORDER BY R.FECHEN DESC;';
        if ($resultado = $this->conexion->query($query)) {
            $array_recetas = crearArrayRecetas($resultado);
            return $array_recetas;
        } else {
            echo "no ha entrado";
            return $array_recetas;
        }
    }

    function cerrar_conexion() {
        // cierra la conexion
        if ($this->conexion->close()) {
            
        } else {
            echo "NO SE HA CERRADO";
        }
    }

}
