<?php

class BlogBd extends AbstractBD {

    protected $bd;
    protected $ObjetDefault = "Blog";
    
    function __construct() {
        $this->crearBd($this->bd);
    }

    function insertarBlog($blog) {
        /* Funcion para insertar una receta en la base de datos */
        $query1 = 'INSERT INTO SOCIALBLOG (NOMBLOG,CODBLOG,LINKBLOG,AUTORBLOG,DESBLOG) VALUES("' . $blog->getNombre() . '","' . $blog->getCodigo() . '","' . $blog->getLink() . '","' . $blog->getAutor() . '","' . $blog->getDescripcion() . '");';
        $query2 = 'INSERT INTO SECBLOG (CODBLOG,CATBLOG) VALUES ("' . $blog->getCodigo() . '","' . $blog->getCategoria() . '");';
        $query3 = 'INSERT INTO IMGBLOG (ID, NOMIMG, IMG, TIPOIMG, CODRE) VALUES("0","' . $blog->getNombreImg() . '","' . $blog->getImagen() . '","' . $blog->getTipoImg() . '","' . $blog->getCodigoReceta() . '");';

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
    
    function recuperarBlogSeccion($seccion) {
        /* funcion para recuperar una receta de la base de datos buscando por seccion */
        $array_recetas = array();
        $query = 'SELECT B.*, M.NOMIMG, M.IMG, M.TIPOIMG, S.CATBLOG FROM SOCIALBLOG B, SECLOGRO S, IMGBLOG M WHERE B.CODBLOG = S.CODBLOG AND S.CODBLOG = M.CODBLOG AND S.CATBLOG = "' . $seccion . '" ORDER BY B.FECHEN DESC;';
        return $this->selectQuery($query, $this->getObjetDefault());
    }
    
    
    
    

}
