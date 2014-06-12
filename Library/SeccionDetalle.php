<?php

class SeccionDetalle {

    protected $zona;
    protected $seccion;
    protected $RecetaBd;

    //protected $codigoUsuario;

    function __construct($zona, $seccion) {
        $this->zona = $zona;
        $this->seccion = $seccion;
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

    function activo($seccion, $sitio) {
        $activo = "activo-";
        $hover = "hover-";
        if ($sitio == $seccion) {
            return $activo . $seccion;
        } else {
            return $hover . $sitio;
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
