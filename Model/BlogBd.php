<?php

class BlogBd extends AbstractBD {

    protected $bd;
    protected $ObjetDefault = "Blog";

    function __construct() {
        $this->crearBd($this->bd);
    }

    public function getObjetDefault() {
        return $this->ObjetDefault;
    }

    function insertarBlog($blog) {
        /* Funcion para insertar una receta en la base de datos */
        $query1 = 'INSERT INTO SOCIALBLOG (NOMBLOG,CODBLOG,CODUS,LINKBLOG,AUTORBLOG,DESBLOG) VALUES("' . $blog->getTitulo() . '","' . $blog->getCodigo() . '","' . $blog->getCodigoUsuario() . '","' . $blog->getLink() . '","' . $blog->getAutor() . '","' . $blog->getDescripcion() . '");';
        $query2 = 'INSERT INTO SECBLOG (CODBLOG,CATBLOG) VALUES ("' . $blog->getCodigo() . '","' . $blog->getCategoria() . '");';
        $query3 = 'INSERT INTO IMGBLOG (ID, NOMIMG, IMG, TIPOIMG, CODBLOG) VALUES("0","' . $blog->getNombreImg() . '","' . $blog->getImagen() . '","' . $blog->getTipoImg() . '","' . $blog->getCodigo() . '");';

        return $this->insertQuery(array($query1, $query2, $query3));
    }

    function insertarTagsBlog($tags, $codigoBlog) {
        // Esta funcion inserta tags relacionados con un codigo de Receta en la BBDD
        $array_tags = explode(' ', $tags);
        $query = array();
        for ($x = 0; $x < count($array_tags); $x++) {
            $query[$x] = 'INSERT INTO TAGBLOG (CODBLOG, NOMTAG) VALUES ("' . $codigoBlog . '","' . $array_tags[$x] . '");';
        }
        return $this->insertQuery($query);
    }

    function actualizarValoracion($codigoBlog) {
        $query = 'SELECT VALUS FROM VALUSBLO WHERE CODBLOG = "' . $codigoBlog . '";';
        $valoraciones = $this->selectQuery($query);
        $valorFinal = array_sum($valoraciones) / count($valoraciones);
        $query2 = 'UPDATE SOCIALBLOG SET VALBLOG = "' . $valorFinal . '" WHERE CODBLOG = "' . $codigoBlog . '";';
        return $this->updateQuery($query2);
    }

    function recuperarValUsuario($codigoBlog, $codigoUsuario) {
        $query = 'SELECT VALUS FROM VALUSBLO WHERE CODUS = "' . $codigoUsuario . '" AND CODBLOG = "' . $codigoBlog . '" ;';
        $resultado = $this->selectQuery($query);
        return $resultado[0];
    }

    function recuperarBlogSeccion($seccion) {
        /* funcion para recuperar una receta de la base de datos buscando por seccion */
        $query = 'SELECT B.*, M.NOMIMG, M.IMG, M.TIPOIMG, S.CATBLOG FROM SOCIALBLOG B, SECBLOG S, IMGBLOG M WHERE B.CODBLOG = S.CODBLOG AND S.CODBLOG = M.CODBLOG AND S.CATBLOG = "' . $seccion . '" ORDER BY B.FECHEN DESC;';
        return $this->selectQuery($query, $this->getObjetDefault());
    }

    function recuperarBlogFavUsuario($codigoUsuario) {
        /* funcion para recuperar una receta de la base de datos buscando por seccion */
        $query = 'SELECT B.*, M.NOMIMG, M.IMG, M.TIPOIMG, S.CATBLOG FROM SOCIALBLOG B, SECBLOG S, IMGBLOG M, BLOGFAV F WHERE B.CODBLOG = S.CODBLOG AND S.CODBLOG = M.CODBLOG AND S.CODBLOG = F.CODBLOG AND F.CODUS = "' . $codigoUsuario . '" ORDER BY B.FECHEN DESC;';
        return $this->selectQuery($query, $this->getObjetDefault());
    }

    function recuperarObjetoPorTags($tag) {
        /* funcion para recuperar una oferta de la BBDD buscando por sus tags */
        $query = 'SELECT B.*, M.NOMIMG, M.IMG, M.TIPOIMG,  S.CATBLOG FROM SOCIALBLOG B, SECBLOG S, TAGBLOG T, IMGBLOG M WHERE B.CODBLOG = S.CODBLOG AND B.CODBLOG = T.CODBLOG AND B.CODBLOG = M.CODBLOG AND NOMTAG = "' . $tag . '";';
        return $this->selectQuery($query, $this->getObjetDefault());
    }
    
    function recuperarBlogsUsuario($codigoUsuario) {
        $query = 'SELECT B.*, M.NOMIMG, M.IMG, M.TIPOIMG, S.CATBLOG FROM SOCIALBLOG B, SECBLOG S, IMGBLOG M WHERE B.CODBLOG = S.CODBLOG AND S.CODBLOG = M.CODBLOG AND B.CODUS = "' . $codigoUsuario . '" ORDER BY B.FECHEN DESC;';
        return $this->selectQuery($query,$this->getObjetDefault());
    }

}
