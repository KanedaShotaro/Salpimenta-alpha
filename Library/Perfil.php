<?php

class Perfil {

    protected $template = "miFichaView";
    protected $usuario;
    protected $recetas;
    protected $seccion;
    protected $blogs;

    function __construct($usuario) {
        $this->usuario = $usuario;
        $this->recetasUsuario($usuario);
        $this->blogsUsuario($usuario);
    }

    public function getTemplate() {
        return $this->template;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getRecetas() {
        return $this->recetas;
    }

    public function getSeccion() {
        return $this->seccion;
    }

    public function getBlogs() {
        return $this->blogs;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setRecetas($recetas) {
        $this->recetas = $recetas;
    }

    public function setSeccion($seccion) {
        $this->seccion = $seccion;
    }

    public function setBlogs($blogs) {
        $this->blogs = $blogs;
    }

    private function recetasUsuario($usuario) {
        $recetaBd = new RecetaBd();
        $recetasOrdenadas = array();
        $totalSec = 12;
        $recetasUsuario = $recetaBd->recuperarRecetasUsuario($usuario->getCodigoUsuario());

        if (count($recetasUsuario) == 0) {
            return array();
        } else {
            $y = 1;
            while ($y <= $totalSec) {
                for ($x = 0; $x < count($recetasUsuario); $x++) {
                    if ($recetasUsuario[$x]->getCategoriaReceta() == $y) {

                        $recetasUsuario[$x]->setCategoriaReceta(RecoverCat::nombreSeccion($y));
                        $recetasOrdenadas[$y][$x] = $recetasUsuario[$x];
                    }
                }
                $y++;
            }
            sort($recetasOrdenadas);
            for ($r = 0; $r < count($recetasOrdenadas); $r++) {
                sort($recetasOrdenadas[$r]);
            }
            for ($k = 0; $k < count($recetasOrdenadas); $k++) {
                $seccion[$k] = new Seccion(RecoverCat::numeroSeccion($recetasOrdenadas[$k][0]->getCategoriaReceta()));
            }
        }

        $this->setRecetas($recetasOrdenadas);
        $this->setSeccion($seccion);
    }

    function blogsUsuario($usuario) {

        $blogBd = new BlogBd();
        $totalSec = 2;


        $BlogsUsuario = $blogBd->recuperarBlogsUsuario($usuario->getCodigoUsuario());

        if (count($BlogsUsuario) == 0) {
            return array();
        } else {

            $y = 1;
            while ($y <= $totalSec) {
                for ($x = 0; $x < count($BlogsUsuario); $x++) {
                    if ($BlogsUsuario[$x]->getCategoria() == $y) {
                        $BlogsUsuario[$x]->setCategoria(RecoverCat::nombreSeccionBlog($y));
                        $BlogsOrdenados[$y][$x] = $BlogsUsuario[$x];
                    }
                }
                $y++;
            }

            sort($BlogsOrdenados);
            for ($r = 0; $r < count($BlogsOrdenados); $r++) {
                sort($BlogsOrdenados[$r]);
            }
            $this->setBlogs($BlogsOrdenados);
        }
    }

    public function execute() {

        $template = $this->getTemplate();
        $usuario = $this->getUsuario();
        $recetas = $this->getRecetas();
        $seccion = $this->getSeccion();
        $blogs = $this->getBlogs();

        $view = new View($template, array("usuario" => $usuario, "recetas" => $recetas, "seccion" => $seccion, "blogs" => $blogs));
        $view->execute();
    }

}
