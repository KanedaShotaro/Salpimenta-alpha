<?php

class SeccionDetalle {

    protected $zona;
    protected $seccionNombre;
    protected $RecetaBd;
    protected $paginaInicial = 0;
    protected $numeroMaxRecetas = 12;
    protected $paginaActual;

    //protected $codigoUsuario;

    function __construct($zona, $seccionNombre, $paginaActual) {
        $this->zona = $zona;
        $this->seccion = $seccionNombre;
        $this->RecetaBd = new RecetaBd();
        $this->setPaginaActual($paginaActual);
    }

    public function getPaginaInicial() {
        return $this->paginaInicial;
    }

    public function getNumeroMaxRecetas() {
        return $this->numeroMaxRecetas;
    }

    public function getPaginaActual() {
        return $this->paginaActual;
    }

    public function setPaginaInicial($paginaInicial) {
        $this->paginaInicial = $paginaInicial;
    }

    public function setNumeroMaxRecetas($numeroMaxRecetas) {
        $this->numeroMaxOfertas = $numeroMaxRecetas;
    }

    public function setPaginaActual($paginaActual) {
        if ($paginaActual == "") {
            $this->paginaActual = $this->getPaginaInicial();
        } else {
            $paginaActual--;
            $this->paginaActual = $paginaActual;
        }
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

        $paginaActual = $this->getPaginaActual();
        $seccionNombre = $this->getSeccion();
        $zona = $this->getZona();
        $RecetasPorPaginas = array();
        $numeroMaxRecetas = $this->getNumeroMaxRecetas();
        $paginaSiguiente = $paginaActual + 1;

        $recetas = $this->recuperarRecetas();
        $seccion = new Seccion(RecoverCat::numeroSeccion($seccionNombre));

        $cantidadHojas = ceil(count($recetas) / $numeroMaxRecetas);
        $y = $paginaActual * $numeroMaxRecetas;
        $t = $y;

        while ($y < ($t + $numeroMaxRecetas) & $y < count($recetas)) {

            array_push($RecetasPorPaginas, $recetas[$y]);
            $y++;
        }

        if (count($recetas) == 0) {
            $view = new View("seccionVaciaView");
            $view->execute();
        } else {
            $view = new View("seccionDetalleView", array('seccionNombre' =>$seccionNombre, 'seccion' => $seccion, 'recetas' => $RecetasPorPaginas, 'zona' => $zona, "pagina" => $paginaSiguiente, "totalPaginas" => $cantidadHojas));
            $view->execute();
        }
    }

}
