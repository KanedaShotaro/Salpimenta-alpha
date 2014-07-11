<?php

abstract class AbstractBD {

    protected $bd;

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

    function crearArrayObjeto($tipoObjeto, $resultado) {
        $arrayObjetos = array();
        $i = 0;

        if ($resultado->num_rows == 0) {
            return $arrayObjetos;
        } else {
            while ($fila = $resultado->fetch_row()) {
                $arrayObjetos[$i] = new $tipoObjeto();
                $arrayObjetos[$i]->dataBaseArray($fila);
                $i++;
            }
        }
        return $arrayObjetos;
    }

    protected function deleteQuery($query) {
        $this->open();
        $delete = ($resultado = $this->obtenerFilas($query)) ? true : false;
        $this->close();
        return $delete;
    }

    protected function selectQuery($query, $tipoObjeto = null) {
        $this->open();
        if ($tipoObjeto == null) {
            $arrayResultado = array();
            if ($resultado = $this->obtenerFilas($query)) {
                while ($fila = $resultado->fetch_row()) {
                    for ($x = 0; $x < count($fila); $x++) {
                        array_push($arrayResultado, $fila[$x]);
                    }
                }
                $this->close();
                return $arrayResultado;
            } else {
                $this->close();
                return $arrayResultado;
            }
        } else {
            if ($resultado = $this->obtenerFilas($query)) {
                $arrayObjetos = $this->crearArrayObjeto($tipoObjeto, $resultado);
                $this->close();
                return $arrayObjetos;
            } else {
                $this->close();
                return $arrayObjetos;
            }
        }
    }

    protected function insertQuery($query = array()) {

        $this->open();
        $this->bd->autoComit(false);
        for ($q = 0; $q < count($query); $q++) {

            $insertado = ($resultado = $this->obtenerFilas($query[$q])) ? true : false;

            if (!$insertado) {
                $this->bd->error();
                $this->bd->rollBack();
                return false;
            }
        }
        $this->bd->commit();
        $this->close();
        return $insertado;
    }

    protected function updateQuery($query) {
        $this->open();
        $actualizado = ($resultado = $this->obtenerFilas($query)) ? true : false;
        if (!$actualizado) {
            $this->bd->error();
        }
        $this->close();
        return $actualizado;
    }

}
