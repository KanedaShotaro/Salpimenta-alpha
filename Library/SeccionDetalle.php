<?php

class SeccionDetalle {

    protected $zona;
    protected $recetas;
    protected $seccion;
    protected $OfertaBd;

    function __construct($zona, $recetas, $seccion, $OfertaBd) {
        $this->zona = $zona;
        $this->recetas = $recetas;
        $this->seccion = $seccion;
        $this->OfertaBd = $OfertaBd;
    }

    public function execute() {
        
        
        
        $view = new View("seccionDetalleView", array('seccion' => $seccion, 'recetas' => $recetas));
        $view->execute();
    }

    function activo($seccion, $sitio) {
        $activo = "activo-";
        $hover = "hover-";
        if ($sitio == $seccion) {
            return $activo . $seccion;
        } else {
            return $hover . $sitio;
        }
    }

    function numero_seccion($nombreSeccion) {
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
        $array_recetas = array();
        $numSec = numero_seccion($seccion);
        $RecetaBd = new RecetaBd();

        $array_recetas = $RecetaBd->recuperar_receta_seccion_usuario($numSec, $codigoUsuario);
        return $array_recetas;
    }

    function obtenerRecetasSeccion($seccion) {
        $array_recetas = array();
        $numSec = numero_seccion($seccion);
        $RecetaBd = new RecetaBd();

        $array_recetas = $RecetaBd->recuperar_receta_seccion($numSec);
        return $array_recetas;
    }

}
