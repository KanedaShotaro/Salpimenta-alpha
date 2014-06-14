<?php

class Seccion {

    protected $nombre;
    protected $css;
    protected $imagen;
    protected $numSeccion;
    protected $link;
    

    function __construct($numSeccion) {
        $this->nombre = RecoverCat::nombreSeccionIdent($numSeccion);
        $this->css = RecoverCat::nombreSeccion($numSeccion);
        $this->imagen = $numSeccion;
        $this->numSeccion = $numSeccion;
        $this->link = $this->createLink($numSeccion);
    }
    
    public function desactivar(){
        $this->setImagen($this->getNumSeccion()."b");
    }
    
    public function getLink() {
        return $this->link;
    }

    public function setLink($link) {
        $this->link = $link;
    }

    
    public function getNombre() {
        return $this->nombre;
    }

    public function getCss() {
        return $this->css;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getNumSeccion() {
        return $this->numSeccion;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCss($css) {
        $this->css = $css;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function setNumSeccion($numSeccion) {
        $this->numSeccion = $numSeccion;
    }
    
    function createLink($numSeccion){
        switch ($numSeccion) {
            case 1:
                return "/index.php?url=seccionDetalleControler&seccion=aperitivos";
                break;
            case 2:
                return "/index.php?url=seccionDetalleControler&seccion=ensaladas-y-verduras";
                break;
            case 3:
                return "/index.php?url=seccionDetalleControler&seccion=arroces-y-cereales";
                break;
            case 4:
                return "/index.php?url=seccionDetalleControler&seccion=sopas-y-cremas";
                break;
            case 5:
                return "/index.php?url=seccionDetalleControler&seccion=pastas-y-pizzas";
                break;
            case 6:
                return "/index.php?url=seccionDetalleControler&seccion=legumbres";
                break;
            case 7:
                return "/index.php?url=seccionDetalleControler&seccion=carnes";
                break;
            case 8:
                return "/index.php?url=seccionDetalleControler&seccion=pescados-y-mariscos";
                break;
            case 9:
                return "/index.php?url=seccionDetalleControler&seccion=huevos";
                break;
            case 10:
                return "/index.php?url=seccionDetalleControler&seccion=setas-y-hongos";
                break;
            case 11:
                return "/index.php?url=seccionDetalleControler&seccion=salsas";
                break;
            case 12:
                return "/index.php?url=seccionDetalleControler&seccion=postres";
                break;
        }
    }

}
