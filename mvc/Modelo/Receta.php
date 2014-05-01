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
   private $urlImagen;
   private $fechaEntrada;
   
   function __construct($nombreReceta, $autorReceta, $elaboracion, $ingredientes, $sugerencia, $valoracion, $temporada, $urlImagen, $fechaEntrada) {
       $this->codigoReceta = gen_chars_no_dup($long = 25);
       $this->nombreReceta = $nombreReceta;
       $this->autorReceta = $autorReceta;
       $this->elaboracion = $elaboracion;
       $this->ingredientes = $ingredientes;
       $this->sugerencia = $sugerencia;
       $this->valoracion = $valoracion;
       $this->temporada = $temporada;
       $this->urlImagen = crearUrlUnica($nombreReceta); 
       $this->fechaEntrada = date("Y-m-d");
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

   public function getUrlImagen() {
       return $this->urlImagen;
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

   public function setUrlImagen($urlImagen) {
       $this->urlImagen = $urlImagen;
   }


}
