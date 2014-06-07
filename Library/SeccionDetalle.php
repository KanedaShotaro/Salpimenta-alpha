<?php

class SeccionDetalle {

    protected $zona;
    protected $seccion;
    protected $RecetaBd;

    //protected $codigoUsuario;

    function __construct($zona, $seccion) {
        $this->zona = $zona;
        $this->seccion = $seccion;
        //$this->codigoUsuario = $_SESSION["usuario"][0]->getCodigoUsuario();
        $this->RecetaBd = new RecetaBd();
    }

    public function getZona() {
        return $this->zona;
    }

    public function getSeccion() {
        return $this->seccion;
    }

    public function getRecetaBd() {
        return $this->RecetaBd;
    }

//    public function getCodigoUsuario() {
//        return $this->codigoUsuario;
//    }

    function activo($seccion, $sitio) {
        $activo = "activo-";
        $hover = "hover-";
        if ($sitio == $seccion) {
            return $activo . $seccion;
        } else {
            return $hover . $sitio;
        }
    }

    function numeroSeccion($nombreSeccion) {
        switch ($nombreSeccion) {
            case "aperitivos":
                return 1;
                break;
            case "ensaladas-y-verduras":
                return 2;
                break;
            case "arroces-y-cereales":
                return 3;
                break;
            case "sopas-y-cremas":
                return 4;
                break;
            case "pastas-y-pizzas":
                return 5;
                break;
            case "legumbres":
                return 6;
                break;
            case "carnes":
                return 7;
                break;
            case "pescados-y-mariscos":
                return 8;
                break;
            case "huevos":
                return 9;
                break;
            case "setas-y-hongos":
                return 10;
                break;
            case "salsas":
                return 11;
                break;
            case "postres":
                return 12;
                break;
        }
    }

    function obtenerRecetasSeccionUsuario($seccion, $codigoUsuario) {
        $arrayRecetas = array();
        //$numSec = $this->numeroSeccion();
        $numSec = RecoverCat::numeroSeccion($seccion);
        $arrayRecetas = $this->RecetaBd->recuperarRecetaSeccionUsuario($numSec, $codigoUsuario);
        return $arrayRecetas;
    }

    function obtenerRecetasSeccion($seccion) {
        $arrayRecetas = array();
        //$numSec = $this->numeroSeccion($seccion);
        $numSec = RecoverCat::numeroSeccion($seccion);
        $arrayRecetas = $this->RecetaBd->recuperarRecetaSeccion($numSec);
        return $arrayRecetas;
    }

    function recuperarRecetas() {
        if ($this->zona == "misalpimenta") {
            $recetas = $this->obtenerRecetasSeccionUsuario($this->seccion, $_SESSION["usuario"][0]->getCodigoUsuario());
        } else {
            $recetas = $this->obtenerRecetasSeccion($this->seccion);
        }

        return $recetas;
    }

    public function execute() {
        $recetas = $this->recuperarRecetas();
        $seccion = $this->getSeccion();
        $zona = $this->getZona();

        $view = new View("seccionDetalleView", array('seccion' => $seccion, 'recetas' => $recetas, 'zona' => $zona));
        $view->execute();
    }

}
