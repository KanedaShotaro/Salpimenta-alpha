<?php

class SeccionDetalle {

    protected $zona;
    protected $seccionNombre;
    protected $RecetaBd;

    //protected $codigoUsuario;

    function __construct($zona, $seccionNombre) {
        $this->zona = $zona;
        $this->seccion = $seccionNombre;
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

    function activo($seccionNombre, $sitio) {
        $activo = "activo-";
        $hover = "hover-";
        if ($sitio == $seccionNombre) {
            return $activo . $seccionNombre;
        } else {
            return $hover . $sitio;
        }
    }

    function obtenerRecetasSeccionUsuario($seccionNombre, $codigoUsuario) {
        $arrayRecetas = array();
        //$numSec = $this->numeroSeccion();
        $numSec = RecoverCat::numeroSeccion($seccionNombre);
        $arrayRecetas = $this->RecetaBd->recuperarRecetaSeccionUsuario($numSec, $codigoUsuario);
        return $arrayRecetas;
    }

    function obtenerRecetasSeccion($seccionNombre) {
        $arrayRecetas = array();
        //$numSec = $this->numeroSeccion($seccionNombre);
        $numSec = RecoverCat::numeroSeccion($seccionNombre);
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
        $seccionNombre = $this->getSeccion();
        $zona = $this->getZona();
        
        $seccion = new Seccion(RecoverCat::numeroSeccion($seccionNombre));
        

        $view = new View("seccionDetalleView", array('seccion' => $seccion, 'recetas' => $recetas, 'zona' => $zona));
        $view->execute();
    }

}
