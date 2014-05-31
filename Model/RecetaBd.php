<?php

class RecetaBd extends AbstractBD {

    protected $bd;
    protected $ObjetDefault = "Receta";

    function __construct() {
        $this->crearBd($this->bd);
    }

    function insertar_receta($receta) {
        /* Funcion para insertar una receta en la base de datos */
        $query1 = 'INSERT INTO RECETA (CODRE,CODUS,NOMRE,AUTORE,ELABRE,INGRE,SUGER,VALRE,TEMRE,URL,FECHEN) VALUES("' . $receta->getCodigoReceta() . '","' . $receta->getCodigoUsuario() . '","' . $receta->getNombreReceta() . '","' . $receta->getAutorReceta() . '","' . htmlspecialchars($receta->getElaboracion()) . '","' . htmlspecialchars($receta->getIngredientes()) . '","' . htmlspecialchars($receta->getSugerencia()) . '","' . $receta->getValoracion() . '","' . $receta->getTemporada() . '","' . $receta->getUrlReceta() . '","' . $receta->getFechaEntrada() . '");';
        $query2 = 'INSERT INTO SECREC (CATREC,CODRE) VALUES ("' . $receta->getCategoriaReceta() . '","' . $receta->getCodigoReceta() . '");';
        $query3 = 'INSERT INTO IMGRE (ID, NOMIMG, IMG, TIPOIMG, CODRE) VALUES("0","' . $receta->getNombreImg() . '","' . $receta->getImagen() . '","' . $receta->getTipoImg() . '","' . $receta->getCodigoReceta() . '");';

        return $this->insertQuery(array($query1, $query2, $query3));
    }

    function insertar_tags_receta($tags, $codigoReceta) {
        // Esta funcion inserta tags relacionados con un codigo de Receta en la BBDD
        $array_tags = explode(' ', $tags);
        $query = array();
        for ($x = 0; $x < count($array_tags); $x++) {
            $query[$x] = 'INSERT INTO TAGRE (CODRE, NOMTAG) VALUES ("' . $codigoReceta . '","' . $array_tags[$x] . '");';
        }
        return $this->insertQuery($query);
    }

    function recuperarRecetaSeccion($seccion) {
        /* funcion para recuperar una receta de la base de datos buscando por seccion */
        $array_recetas = array();
        $query = 'SELECT R.*, M.NOMIMG, M.IMG, M.TIPOIMG, S.CATREC FROM RECETA R, SECREC S, IMGRE M WHERE R.CODRE = S.CODRE AND S.CODRE = M.CODRE AND S.CATREC = "' . $seccion . '" ORDER BY R.FECHEN DESC;';
        return $this->selectQuery($query, $this->getObjetDefault());
    }

    function comprobarRecetaUrl($url) {
        /* Esta funcion selectiona el codigo de oferta correspondiente a la url del navegador
          recogiendo la ultima parte que corresponde con lo insertado en el campo de la base de datos */
        $query = 'SELECT CODRE FROM RECETA WHERE URL = "' . $url . '";';
        $resultado = $this->selectQuery($query);
        return (count($resultado) > 0) ? true : false;
    }

    function recuperarRecetaUrl($url) {
        /* Funcion para recuperar una oferta de la base de datos buscando por url */
        $array_url = explode("/", $url);
        $array_url2 = explode(".", $array_url[count($array_url) - 1]);
        $url = $array_url[count($array_url) - 2] . "/" . $array_url2[0];
        $query = 'SELECT R.*, M.NOMIMG, M.IMG, M.TIPOIMG, S.CATREC FROM RECETA R, SECREC S, IMGRE M WHERE R.CODRE = S.CODRE AND S.CODRE = M.CODRE AND R.URL = "' . $url . '" ORDER BY R.FECHEN DESC;';
        $resultado = $this->selectQuery($query, $this->getObjetDefault());
        return $resultado;
    }

    function recuperarValUsuario($codigoReceta, $codigoUsuario) {
        $query = 'SELECT VALUS FROM VALORUS WHERE CODUS = "' . $codigoUsuario . '" AND CODRE = "' . $codigoUsuario . '" ;';
        $resultado = $this->selectQuery($query);
        return $resultado[0];
    }

    function recuperarRecetaSeccionUsuario($seccion, $codigoUsuario) {

        $array_recetas = array();
        $query = 'SELECT R.*, M.NOMIMG, M.IMG, M.TIPOIMG, S.CATREC FROM RECETA R, SECREC S, IMGRE M, RECFAV F WHERE R.CODRE = S.CODRE AND S.CODRE = M.CODRE AND S.CODRE = F.CODRE AND S.CATREC = "' . $seccion . '" AND F.CODUS = "' . $codigoUsuario . '"  ORDER BY R.FECHEN DESC;';
        return $this->selectQuery($query, $this->getObjetDefault());
    }

    function countRecetasUsuario($codigoUsuario) {
        $this->open();
        $query = 'SELECT count(*) FROM RECETA where CODUS = "' . $codigoUsuario . '" ;';
        return $this->selectQuery($query);
    }

    public function getObjetDefault() {
        return $this->ObjetDefault;
    }

}
