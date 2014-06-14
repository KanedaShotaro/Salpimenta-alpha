<?php

class Blog extends AbstractFun {

    protected $titulo;
    protected $codigoUsuario;
    protected $codigo;
    protected $link;
    protected $autor;
    protected $descripcion;
    protected $categoria;
    protected $fechaEntrada;
    protected $valoracion;
    protected $valoracionUsuario;
    
    private $imagen;
    private $nombreImg;
    private $tipoImg;

    function __construct() {
        
    }

    function NewBlog($titulo, $codigoUsuario, $link, $autor, $descripcion, $categoria, $img) {
        $this->titulo = $titulo;
        $this->codigo = $this->genCharsNoDup(25);
        $this->codigoUsuario = $codigoUsuario;
        $this->link = $link;
        $this->autor = $autor;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->introducirImg($img);
    }

    function dataBaseArray($vars = array()) {
        $x = 0;
        $this->setTitulo($vars[$x]);
        $x++;
        $this->setCodigo($vars[$x]);
        $x++;
        $this->setCodigoUsuario($vars[$x]);
        $x++;
        $this->setLink($vars[$x]);
        $x++;
        $this->setAutor($vars[$x]);
        $x++;
        $this->setDescripcion(htmlspecialchars_decode($vars[$x]));
        $x++;
        $this->setFechaEntrada($vars[$x]);
        $x++;
        $this->setNombreImg($vars[$x]);
        $x++;
        $this->setImagen($vars[$x]);
        $x++;
        $this->setTipoImg($vars[$x]);
        $x++;
        $this->setCategoria($vars[$x]);
        $x++;
    }
    
    public function getValoracionUsuario() {
        return $this->valoracionUsuario;
    }

    public function setValoracionUsuario($valoracionUsuario) {
        $this->valoracionUsuario = $valoracionUsuario;
    }

        
    public function getValoracion() {
        return $this->valoracion;
    }

    public function setValoracion($valoracion) {
        $this->valoracion = $valoracion;
    }

    
    public function getFechaEntrada() {
        return $this->fechaEntrada;
    }

    public function setFechaEntrada($fechaEntrada) {
        $this->fechaEntrada = $fechaEntrada;
    }

    public function getCodigoUsuario() {
        return $this->codigoUsuario;
    }

    public function setCodigoUsuario($codigoUsuario) {
        $this->codigoUsuario = $codigoUsuario;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getLink() {
        return $this->link;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getDescripcion() {
        return $this->descripcion;
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

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setLink($link) {
        $this->link = $link;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
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

}
