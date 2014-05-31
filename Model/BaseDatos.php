<?php

require_once '/var/www/Salpimenta-backend/Model/poolConexion.php';

class BaseDatos {

    private $host;
    private $user;
    private $pass;
    private $bd;
    private $conexion;

    function __construct($host, $user, $pass, $bd) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->bd = $bd;
    }

    function establecer_conexion() {
        $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->bd);
        $conectado = ($this->conexion->connect_errno) ? true : false;
        return $conectado;
    }

    function info() {
        // informacion sobre la base de datos.
        return $this->conexion->host_info;
    }

    public function error() {
        echo "<pre>";
        echo "query seccion" . $this->conexion->error;
        echo "</pre>";
    }

    public function getConexion() {
        return $this->conexion;
    }

    public function autoComit($boolean) {
        $this->conexion->autocommit($boolean);
    }

    public function rollBack() {
        $this->conexion->rollback();
    }

    public function commit() {
        $this->conexion->commit();
    }

    function cerrar_conexion() {
        if ($this->conexion->close()) {
            
        } else {
            echo "NO SE HA CERRADO";
        }
    }

}
