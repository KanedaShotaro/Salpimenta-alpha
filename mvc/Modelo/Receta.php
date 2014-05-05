<?php

echo "Receta/";
require_once '/var/www/Salpimenta-backend/mvc/Controlador/funcionesControlador.php';
class Receta {
   private $codigoReceta;
   private $nombreReceta;
   private $autorReceta;
   private $elaboracion;
   private $ingredientes;
   private $sugerencia;
   private $valoracion;
   private $temporada;
   private $urlReceta;
   private $fechaEntrada;
   private $categoriaReceta;
   // variables imagen de la receta
   private $imagen;
   private $nombreImg;
   private $tipoImg;
   
   function __construct($nombreReceta, $autorReceta, $elaboracion, $ingredientes, $sugerencia,$temporada,$categoriaReceta) {
       $this->codigoReceta = gen_chars_no_dup($long = 25);
       $this->nombreReceta = $nombreReceta;
       $this->autorReceta = $autorReceta;
       $this->elaboracion = $elaboracion;
       $this->ingredientes = $ingredientes;
       $this->sugerencia = $sugerencia;
       $this->valoracion = 0;
       $this->temporada = $temporada;
       $this->urlReceta = crearUrlUnica($nombreReceta); 
       $this->fechaEntrada = date("Y-m-d");
       $this->categoriaReceta = $categoriaReceta;
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
