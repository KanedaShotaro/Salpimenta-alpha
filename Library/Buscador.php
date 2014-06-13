<?php

class Buscador extends AbstractFun {

    protected $recetaBd;
    protected $blogsBd;
    protected $tags;

    function __construct($tags) {
        $this->tags = $tags;
        $this->recetaBd = new RecetaBd();
        $this->blogsBd = new BlogBd();
    }

    public function getRecetaBd() {
        return $this->recetaBd;
    }

    public function getBlogsBd() {
        return $this->blogsBd;
    }

    public function getArrayBlogs() {
        return $this->arrayBlogs;
    }

    public function setArrayBlogs($arrayBlogs) {
        $this->arrayBlogs = $arrayBlogs;
    }

    public function getArrayRecetas() {
        return $this->arrayRecetas;
    }

    public function setArrayRecetas($arrayRecetas) {
        $this->arrayRecetas = $arrayRecetas;
    }

    public function getTags() {
        return $this->tags;
    }

    public function setTags($tags) {
        $this->tags = $tags;
    }

    function obtenerObjetoPorTags($tags, $objetoBd) {
        $arrayObjetos = array();

        $tags = sanearString($tags);
        $arrayTags = explode(' ', $tags);

        for ($x = 0; $x < count($arrayTags); $x++) {
            $array_temporal = $objetoBd->recuperarObjetoPorTags($arrayTags[$x]);
            for ($i = 0; $i < count($array_temporal); $i++) {
                array_push($arrayObjetos, $array_temporal[$i]);
            }
        }
        $e = 0;

        while ($e < count($arrayObjetos)) {
            $f = 0;
            $contador = 0;
            while ($f < count($arrayObjetos)) {
                if ($arrayObjetos[$e]->getCodigo() == $arrayObjetos[$f]->getCodigo()) {
                    $contador++;
                    if ($contador == 2) {
                        unset($arrayObjetos[$f]);
                        $contador = 1;
                    }
                }
                $f++;
            }
            $arrayObjetos = array_values($arrayObjetos);
            $e++;
        }
        return $arrayObjetos;
    }

    public function execute() {

        $tags = $this->getTags();
        $recetaBd = $this->getRecetaBd();
        $blogBd = $this->getBlogsBd();
        $recetas = $this->obtenerObjetoPorTags($tags, $recetaBd);
        $blogs = $this->obtenerObjetoPorTags($tags, $blogBd);


        $view = new View("buscadorView", array("recetas" => $recetas, "blogs" => $blogs));
        $view->execute();
    }

}
