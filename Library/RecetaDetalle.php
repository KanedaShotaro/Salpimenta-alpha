<?php

class RecetaDetalle {

    protected $usuario;
    protected $recetaBd;
    protected $usuarioBd;
    protected $urlReceta;
    protected $seccion;
    protected $zona;
    protected $autor;
    protected $editar;
    protected $plantilla = "recetaDetalleView";

    function __construct($urlReceta, $seccion, $zona, $editar) {
        $this->usuario = $_SESSION['usuario'][0];
        $this->recetaBd = new RecetaBd();
        $this->usuarioBd = new UsuarioBd();
        $this->urlReceta = $urlReceta;
        $this->seccion = $seccion;
        $this->zona = $zona;
        $this->editar = $editar;
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

    public function getEditar() {
        return $this->editar;
    }

    public function execute() {
        $editar = $this->getEditar();
        $usuario = $this->getUsuario();
        $plantilla = $this->getPlantilla();
        $seccion = $this->getSeccion();
        $zona = $this->getZona();
        $urlReceta = $this->getUrlReceta();
        $receta = $this->obtenerDetalleReceta($urlReceta);
        $autor = $this->obtenerAutorReceta($receta->getCodigoReceta());
        $this->obtenerValoracionUsuario($receta, $usuario);

        if ($editar == "activo") {
            $plantilla = "recetaDetalleEditView";
            $checkedSeccion = RecoverCat::checkedSeccion($seccion);
            $checkedTemporada = RecoverCat::checkedTemporada($receta->getTemporada());
            $view = new View($plantilla, array('checkedTemporada' => $checkedTemporada, 'checkedSeccion' => $checkedSeccion, 'seccion' => $seccion, 'autor' => $autor, 'receta' => $receta, 'zona' => $zona));
            $view->execute();
        } else {
            $view = new View($plantilla, array('seccion' => $seccion, 'autor' => $autor, 'receta' => $receta, 'zona' => $zona));
            $view->execute();
        }
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
        
        if ($valusuario == null) {
            $valusuario = "Sin valorar";
        }
        $receta->setValUsuario($valusuario);
    }

    function obtenerAutorReceta($codigoReceta) {
        $array_autor = $this->usuarioBd->recuperarAutorReceta($codigoReceta);
        $autor = $array_autor[0];
        return $autor;
    }

}
