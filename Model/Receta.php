<?php

echo "Receta/";

//require_once '/var/www/Salpimenta-backend/Controlador/funcionesControlador.php';
class Receta {

    private $codigoReceta;
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

    function newReceta($nombreReceta, $autorReceta, $elaboracion, $ingredientes, $sugerencia, $temporada, $categoriaReceta) {
        $this->codigoReceta = $this->genCharsNoDup(25);
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
    }

    function genCharsNoDup($long) {
        /* Funcion que crea un codigo unico de 25 caracteres de longitud */
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

        mt_srand((double) microtime() * 1000000);
        $i = 0;
        $pass = null;
        while ($i != $long) {
            $rand = mt_rand() % strlen($chars);
            $tmp = $chars[$rand];
            $pass = $pass . $tmp;
            $chars = str_replace($tmp, "", $chars);
            $i++;
        }
        return strrev($pass);
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
        $this->categoriaReceta = $categoriaReceta;
    }

    public function getCodigoReceta() {
        return $this->codigoReceta;
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

    public function setCodigoReceta($codigoReceta) {
        $this->codigoReceta = $codigoReceta;
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
