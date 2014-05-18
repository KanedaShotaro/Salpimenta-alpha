<?php

abstract class AbstractBD {

    protected function crearBd($bd) {
        $bd = poolBBDD();
        $this->bd = $bd;
    }

    protected function obtenerFilas($query) {
        return $this->bd->getConexion()->query($query);
    }

    protected function open() {
        $this->bd->establecer_conexion();
    }

    protected function close() {
        $this->bd->cerrar_conexion();
    }

    protected function error() {
        $this->bd->error();
    }

}
