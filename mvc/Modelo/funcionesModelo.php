<?php

echo "funcionesModelo/";

function poolBBDD() {
    $bd = new BaseDatos('192.168.1.190', 'alumno', 'alumno', 'SALPIMENTA');
    return $bd;
}

function crearArrayUsuario($resultado) {
    $array_usuario = array();
    $i = 0;

    while ($fila = $resultado->fetch_row()) {
        $x = 0;
        
        $usuario = new Usuario();
        $usuario->setEmail($fila[$x]);
        $x++;
        $usuario->setCodigoUsuario($fila[$x]);
        $x++;
        $usuario->setNombre($fila[$x]);
        $x++;
        $usuario->setApellido1($fila[$x]);
        $x++;
        $usuario->setApellido2($fila[$x]);
        $x++;
        $usuario->setPassword($fila[$x]);
        $x++;
        $usuario->setFechaNacimiento($fila[$x]);
        $x++;
        $usuario->setFechaIngreso($fila[$x]);
        $x++;
        $usuario->setPlatoFavorito($fila[$x]);
        $x++;
        $usuario->setRecetasMax($fila[$x]);
        $x++;

        $array_usuario[$i] = $usuario;
        $i++;
    }
    return $array_usuario;
}

