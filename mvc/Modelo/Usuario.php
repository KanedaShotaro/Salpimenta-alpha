<?php
echo "Usuario/";
require_once '/var/www/Salpimenta-backend/mvc/Controlador/funcionesControlador.php';
class Usuario {
    private $codigoUsuario;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $password;
    private $email;
    private $fechaIngreso;
    private $fechaNacimiento;
    private $platoFavorito;
    private $recetasMax;
    
    function __construct($nombre, $apellido1, $apellido2, $password, $email,$fechaNacimiento, $platoFavorito) {
        $this->codigoUsuario = gen_chars_no_dup($long = 25);
        $this->nombre = strtoupper($nombre);
        $this->apellido1 = strtoupper($apellido1);
        $this->apellido2 = strtoupper($apellido2);
        $this->password = $password;
        $this->email = strtoupper($email);
        $this->fechaIngreso = date("Y-m-d");
        $this->fechaNacimiento = convertirFechaAMysql($fechaNacimiento);
        $this->platoFavorito = strtoupper($platoFavorito);
        $this->recetasMax = 5;
    }
    
    public function getCodigoUsuario() {
        return $this->codigoUsuario;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido1() {
        return $this->apellido1;
    }

    public function getApellido2() {
        return $this->apellido2;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function getPlatoFavorito() {
        return $this->platoFavorito;
    }

    public function getRecetasMax() {
        return $this->recetasMax;
    }

    public function setCodigoUsuario($codigoUsuario) {
        $this->codigoUsuario = $codigoUsuario;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido1($apellido1) {
        $this->apellido1 = $apellido1;
    }

    public function setApellido2($apellido2) {
        $this->apellido2 = $apellido2;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setFechaIngreso($fechaIngreso) {
        $this->fechaIngreso = $fechaIngreso;
    }

    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setPlatoFavorito($platoFavorito) {
        $this->platoFavorito = $platoFavorito;
    }

    public function setRecetasMax($recetasMax) {
        $this->recetasMax = $recetasMax;
    }



}
