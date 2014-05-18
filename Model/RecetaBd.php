<?php

class RecetaBd extends AbstractBD {

    protected $bd;

    function __construct() {
        $this->crearBd($this->bd);
    }

    function insertar_receta($receta) {
        $this->open();
        /* Funcion para insertar una receta en la base de datos */
        $query = 'INSERT INTO RECETA (CODRE,CODUS,NOMRE,AUTORE,ELABRE,INGRE,SUGER,VALRE,TEMRE,URL,FECHEN) VALUES("' . $receta->getCodigoReceta() . '","' . $receta->getCodigoUsuario() . '","' . $receta->getNombreReceta() . '","' . $receta->getAutorReceta() . '","' . htmlspecialchars($receta->getElaboracion()) . '","' . htmlspecialchars($receta->getIngredientes()) . '","' . htmlspecialchars($receta->getSugerencia()) . '","' . $receta->getValoracion() . '","' . $receta->getTemporada() . '","' . $receta->getUrlReceta() . '","' . $receta->getFechaEntrada() . '");';
        $insertado = ($resultado = $this->obtenerFilas($query)) ? true : false;
        if (!$insertado) {
            echo "<pre>";
            echo "query receta" . $this->conexion->error;
            echo "</pre>";
        }
        $query2 = 'INSERT INTO SECREC (CATREC,CODRE) VALUES ("' . $receta->getCategoriaReceta() . '","' . $receta->getCodigoReceta() . '");';
        $insertado = ($resultado = $this->obtenerFilas($query2)) ? true : false;
        if (!$insertado) {
            echo "<pre>";
            echo "query seccion" . $this->conexion->error;
            echo "</pre>";
        }
        $query3 = 'INSERT INTO IMGRE (ID, NOMIMG, IMG, TIPOIMG, CODRE) VALUES("0","' . $receta->getNombreImg() . '","' . $receta->getImagen() . '","' . $receta->getTipoImg() . '","' . $receta->getCodigoReceta() . '");';
        $insertado = ($resultado = $this->obtenerFilas($query3)) ? true : false;
        if (!$insertado) {
            echo "<pre>";
            echo "query imagen" . $this->conexion->error;
            echo "</pre>";
        }
        $this->close();
        return $insertado;
    }

    function insertar_tags_receta($tags, $codigoReceta) {
        $this->open();
        // Esta funcion inserta tags relacionados con un codigo de Receta en la BBDD
        $array_tags = explode(' ', $tags);
        for ($x = 0; $x < count($array_tags); $x++) {
            $query = 'INSERT INTO TAGRE (CODRE, NOMTAG) VALUES ("' . $codigoReceta . '","' . $array_tags[$x] . '");';
            $insertado = ($resultado = $this->obtenerFilas($query)) ? true : false;
        }
        $this->close();
        return $insertado;
    }

    function recuperarRecetaSeccion($seccion) {
        $this->open();
        /* funcion para recuperar una receta de la base de datos buscando por seccion */
        $array_recetas = array();
        $query = 'SELECT R.*, M.NOMIMG, M.IMG, M.TIPOIMG, S.CATREC FROM RECETA R, SECREC S, IMGRE M WHERE R.CODRE = S.CODRE AND S.CODRE = M.CODRE AND S.CATREC = "' . $seccion . '" ORDER BY R.FECHEN DESC;';
        if ($resultado = $this->obtenerFilas($query)) {
            $array_recetas = $this->crearArrayRecetas($resultado);
            $this->close();
            return $array_recetas;
        } else {
            $this->close();
            return $array_recetas;
        }
    }

    function comprobarRecetaUrl($url) {
        $this->open();
        /* Esta funcion selectiona el codigo de oferta correspondiente a la url del navegador
          recogiendo la ultima parte que corresponde con lo insertado en el campo de la base de datos */
        //$array_url = explode("/", $url);
        //$array_url2 = explode(".", $array_url[count($array_url) - 1]);
        //$url = $array_url[count($array_url) - 2] . "/" . $array_url2[0];
        $query = 'SELECT CODRE FROM RECETA WHERE URL = "' . $url . '";';
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

    function recuperarRecetaUrl($url) {
        $this->open();
        /* Funcion para recuperar una oferta de la base de datos buscando por url */
        $array_url = explode("/", $url);
        $array_url2 = explode(".", $array_url[count($array_url) - 1]);
        $url = $array_url[count($array_url) - 2] . "/" . $array_url2[0];
        $query = 'SELECT R.*, M.NOMIMG, M.IMG, M.TIPOIMG, S.CATREC FROM RECETA R, SECREC S, IMGRE M WHERE R.CODRE = S.CODRE AND S.CODRE = M.CODRE AND R.URL = "' . $url . '" ORDER BY R.FECHEN DESC;';
        if ($resultado = $this->obtenerFilas($query)) {
            $array_recetas = $this->crearArrayRecetas($resultado);
            $this->close();
            return $array_recetas;
        } else {
            $this->close();
            return $array_recetas;
        }
    }

    function recuperarValUsuario($codigoReceta, $codigoUsuario) {
        $this->open();
        $query = 'SELECT VALUS FROM VALORUS WHERE CODUS = "' . $codigoUsuario . '" AND CODRE = "' . $codigoUsuario . '" ;';
        if ($resultado = $this->obtenerFilas($query)) {
            while ($fila = $resultado->fetch_row()) {
                $valUsuario = $fila;
            }
        }
        $this->close();
        return $valUsuario;
    }

    

    function recuperarRecetaSeccionUsuario($seccion, $codigoUsuario) {
        $this->open();
        $array_recetas = array();
        $query = 'SELECT R.*, M.NOMIMG, M.IMG, M.TIPOIMG, S.CATREC FROM RECETA R, SECREC S, IMGRE M, RECFAV F WHERE R.CODRE = S.CODRE AND S.CODRE = M.CODRE AND S.CODRE = F.CODRE AND S.CATREC = "' . $seccion . '" AND F.CODUS = "' . $codigoUsuario . '"  ORDER BY R.FECHEN DESC;';
        if ($resultado = $this->obtenerFilas($query)) {
            $array_recetas = $this->crearArrayRecetas($resultado);
            $this->close();
            return $array_recetas;
        } else {
            $this->close();
            return $array_recetas;
        }
    }
    
    function countRecetasUsuario($codigoUsuario) {
         $this->open();
        $query = 'SELECT count(*) FROM RECETA where CODUS = "' . $codigoUsuario . '" ;';
        if ($resultado = $this->obtenerFilas($query)) {
            while ($fila = $resultado->fetch_row()) {
                $FilasOfertas = $fila;
            }
        }
        $this->close();
        return $FilasOfertas;
    }

    function crearArrayRecetas($resultado) {
        $array_receta = array();
        $i = 0;

        while ($fila = $resultado->fetch_row()) {
            $x = 0;

            $receta = new Receta();
            $receta->setCodigoReceta($fila[$x]);
            $x++;
            $receta->setCodigoUsuario($fila[$x]);
            $x++;
            $receta->setNombreReceta($fila[$x]);
            $x++;
            $receta->setAutorReceta($fila[$x]);
            $x++;
            $receta->setElaboracion(htmlspecialchars_decode($fila[$x]));
            $x++;
            $receta->setIngredientes(htmlspecialchars_decode($fila[$x]));
            $x++;
            $receta->setSugerencia(htmlspecialchars_decode($fila[$x]));
            $x++;
            $receta->setValoracion($fila[$x]);
            $x++;
            $receta->setTemporada($fila[$x]);
            $x++;
            $receta->setUrlReceta($fila[$x]);
            $x++;
            $receta->setFechaEntrada($fila[$x]);
            $x++;
            $receta->setNombreImg($fila[$x]);
            $x++;
            $receta->setImagen($fila[$x]);
            $x++;
            $receta->setTipoImg($fila[$x]);
            $x++;
            $receta->setCategoriaReceta($fila[$x]);
            $x++;

            $array_receta[$i] = $receta;
            $i++;
        }
        return $array_receta;
    }

}
