<?php

class RecetaDetalle {

    protected $usuario;
    protected $recetaBd;
    protected $usuarioBd;
    protected $urlReceta;
    protected $seccion;
    protected $zona;
    protected $autor;
    protected $plantilla = "recetaDetalleView";

    function __construct($urlReceta, $seccion, $zona) {
        $this->usuario = $_SESSION['usuario'][0];
        $this->recetaBd = new RecetaBd();
        $this->usuarioBd = new UsuarioBd();
        $this->urlReceta = $urlReceta;
        $this->seccion = $seccion;
        $this->zona = $zona;
    }

    public function getPlantilla() {
        return $this->plantilla;
    }

    public function getSeccion() {
        return $this->seccion;
    }

    public function getUrlReceta() {
        return $this->urlReceta;
    }

    public function getUsuario() {
        return $this->usuario;
    }
    
    public function getZona() {
        return $this->zona;
    }

    
    public function execute() {

        $usuario = $this->getUsuario();
        $plantilla = $this->getPlantilla();
        $seccion = $this->getSeccion();
        $zona = $this->getZona();
        $urlReceta = $this->getUrlReceta();
        $receta = $this->obtenerDetalleReceta($urlReceta);
        $autor = $this->obtenerAutorReceta($receta->getCodigoReceta());
        $this->obtenerValoracionUsuario($receta, $usuario);

        $view = new View($plantilla, array('seccion' => $seccion, 'autor' => $autor, 'receta' => $receta,'zona' => $zona));
        $view->execute();
    }

    function obtenerDetalleReceta($urlReceta) {
        if ($this->recetaBd->comprobarRecetaUrl($urlReceta)) {
            $array_receta = $this->recetaBd->recuperarRecetaUrl($urlReceta);
            $receta = $array_receta[0];
            return $receta;
        } else {
            echo "error";
        }
    }

    function obtenerValoracionUsuario(&$receta, $usuario) {
        $valusuario = $this->recetaBd->recuperarValUsuario($receta->getCodigoReceta(), $usuario->getCodigoUsuario());
        if ($valusuario[0] == null) {
            $valusuario[0] = "Sin valorar";
        }
        $receta->setValUsuario($valusuario[0]);
    }

    function obtenerAutorReceta($codigoReceta) {
        $array_autor = $this->usuarioBd->recuperarAutorReceta($codigoReceta);
        $autor = $array_autor[0];
        return $autor;
    }

}
