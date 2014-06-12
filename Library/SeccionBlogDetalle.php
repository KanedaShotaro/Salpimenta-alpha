<?php

class SeccionBlogDetalle {

    protected $zona;
    protected $seccion;
    protected $blogBd;

    function __construct($zona, $seccion) {
        $this->zona = $zona;
        $this->seccion = $seccion;
        $this->blogBd = new BlogBd();
    }

    public function getZona() {
        return $this->zona;
    }

    public function getSeccion() {
        return $this->seccion;
    }

    public function getBlogBd() {
        return $this->blogBd;
    }

    public function recuperarBlogsSeccion($seccion) {
        $blogBd = $this->getBlogBd();
        $arrayBlogs = array();
        $numSecBlog = RecoverCat::numeroSeccionBlog($seccion);
      
        $arrayBlogs = $blogBd->recuperarBlogSeccion($numSecBlog);
        return $arrayBlogs;
    }

    public function execute() {
        $zona = $this->getZona();
        $seccion = $this->getSeccion();
        $blogs = $this->recuperarBlogsSeccion($seccion);
        
         $view = new View("seccionBlogDetalleView", array('seccion' => $seccion, 'blogs' => $blogs, 'zona' => $zona));
        $view->execute();
    }

}
