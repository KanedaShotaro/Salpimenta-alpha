<?php

class Receta extends AbstractFun {

    private $codigo;
    private $nombreReceta;
    private $autorReceta;
    private $codigoUsuario;
    private $elaboracion;
    private $ingredientes;
    private $sugerencia;
    private $valoracion;
    private $temporada;
    private $urlReceta;
    private $fechaEntrada;
    private $categoriaReceta;
    private $valUsuario;
    // variables imagen de la receta
    private $imagen;
    private $nombreImg;
    private $tipoImg;

    function __construct() {
        
    }

    function newReceta($nombreReceta, $autorReceta, $elaboracion, $ingredientes, $sugerencia, $temporada, $categoriaReceta, $datosImagen) {

        $this->codigo = $this->genCharsNoDup(25);
        $this->nombreReceta = $nombreReceta;
        $this->autorReceta = $autorReceta;
        $this->elaboracion = $elaboracion;
        $this->ingredientes = $ingredientes;
        $this->sugerencia = $sugerencia;
        $this->valoracion = 0;
        $this->temporada = $temporada;
        $this->urlReceta = $this->crearUrlUnica($nombreReceta);
        $this->fechaEntrada = date("Y-m-d");
        $this->categoriaReceta = $categoriaReceta;

        $this->introducirImg($datosImagen);
    }

    function dataBaseArray($vars = array()) {
        $x = 0;
        $this->setCodigo($vars[$x]);
        $x++;
        $this->setCodigoUsuario($vars[$x]);
        $x++;
        $this->setNombreReceta($vars[$x]);
        $x++;
        $this->setAutorReceta($vars[$x]);
        $x++;
        $this->setElaboracion(htmlspecialchars_decode($vars[$x]));
        $x++;
        $this->setIngredientes(htmlspecialchars_decode($vars[$x]));
        $x++;
        $this->setSugerencia(htmlspecialchars_decode($vars[$x]));
        $x++;
        $this->setValoracion($vars[$x]);
        $x++;
        $this->setTemporada($vars[$x]);
        $x++;
        $this->setUrlReceta($vars[$x]);
        $x++;
        $this->setFechaEntrada($vars[$x]);
        $x++;
        $this->setNombreImg($vars[$x]);
        $x++;
        $this->setImagen($vars[$x]);
        $x++;
        $this->setTipoImg($vars[$x]);
        $x++;
        $this->setCategoriaReceta($vars[$x]);
        $x++;
    }

    function crearUrlUnica($nombre) {
        /* genera una Url de 5 caracteres unica, asociada al nombre de la oferta */
        $nombreString = explode(' ', $nombre);
        $url = implode("-", $nombreString);
        $codigo = $this->genCharsNoDup(5);
        $url .= "/" . $codigo;
        return $url;
    }

    public function getCodigoUsuario() {
        return $this->codigoUsuario;
    }

    public function setCodigoUsuario($codigoUsuario) {
        $this->codigoUsuario = $codigoUsuario;
    }

    public function getValUsuario() {
        return $this->valUsuario;
    }

    public function setValUsuario($valUsuario) {
        $this->valUsuario = $valUsuario;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getNombreImg() {
        return $this->nombreImg;
    }

    public function getTipoImg() {
        return $this->tipoImg;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function setNombreImg($nombreImg) {
        $this->nombreImg = $nombreImg;
    }

    public function setTipoImg($tipoImg) {
        $this->tipoImg = $tipoImg;
    }

    public function getCategoriaReceta() {
        return $this->categoriaReceta;
    }

    public function setCategoriaReceta($categoriaReceta) {
//        $this->categoriaReceta =  RecoverCat::nombreSeccion($categoriaReceta);
        $this->categoriaReceta = $categoriaReceta;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNombreReceta() {
        return $this->nombreReceta;
    }

    public function getAutorReceta() {
        return $this->autorReceta;
    }

    public function getElaboracion() {
        return $this->elaboracion;
    }

    public function getIngredientes() {
        return $this->ingredientes;
    }

    public function getSugerencia() {
        return $this->sugerencia;
    }

    public function getValoracion() {
        return $this->valoracion;
    }

    public function getTemporada() {
        return $this->temporada;
    }

    public function getUrlReceta() {
        return $this->urlReceta;
    }

    public function getFechaEntrada() {
        return $this->fechaEntrada;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setNombreReceta($nombreReceta) {
        $this->nombreReceta = $nombreReceta;
    }

    public function setAutorReceta($autorReceta) {
        $this->autorReceta = $autorReceta;
    }

    public function setElaboracion($elaboracion) {
        $this->elaboracion = $elaboracion;
    }

    public function setIngredientes($ingredientes) {
        $this->ingredientes = $ingredientes;
    }

    public function setSugerencia($sugerencia) {
        $this->sugerencia = $sugerencia;
    }

    public function setValoracion($valoracion) {
        $this->valoracion = $valoracion;
    }

    public function setTemporada($temporada) {
        $this->temporada = $temporada;
    }

    public function setUrlReceta($urlReceta) {
        $this->urlReceta = $urlReceta;
    }

    public function setFechaEntrada($fechaEntrada) {
        $this->fechaEntrada = $fechaEntrada;
    }

}
