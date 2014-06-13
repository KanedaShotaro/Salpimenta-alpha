<?php

class RegistroReceta {

    protected $RecetaBd;
    protected $receta;
    protected $codigoUsuario;
    protected $tags;

    function __construct($vars = array()) {
        extract($vars);
        $this->RecetaBd = new RecetaBd();
        $this->codigoUsuario = $_SESSION["usuario"][0]->getCodigoUsuario();
        $this->tags = $tags;
        $this->receta = new Receta();
        $this->receta->newReceta($nombreReceta, $autorReceta, $elaboracion, $ingredientes, $sugerencia, $temporada, $categoriaReceta, $img);
    }

    public function getRecetaBd() {
        return $this->RecetaBd;
    }

    public function getReceta() {
        return $this->receta;
    }

    public function getCodigoUsuario() {
        return $this->codigoUsuario;
    }

    public function getTags() {
        return $this->tags;
    }

    function execute() {
        $recetaBd = $this->getRecetaBd();
        $receta = $this->getReceta();
        $codigoUsuario = $this->getCodigoUsuario();
        $tags = $this->getTags();
        $receta->setCodigoUsuario($codigoUsuario);


        if ($recetaBd->insertar_Receta($receta)) {
            if ($recetaBd->insertar_tags_receta($tags, $receta->getCodigo())) {
                AlertAction::create("success", "Exito", "Tu receta ha sido introducida!");
                $view = new View("seccionesView");
                $view->execute();
            } else {
                AlertAction::create("warning", "Error", "Los tags no se ha introducido correctamente");
                $view = new View("seccionesView");
                $view->execute();
            }
        } else {
            AlertAction::create("danger", "Error", "Receta no introducida");
            $view = new View("seccionesView", array("alert" => $alert));
            $view->execute();
        }
    }

}
