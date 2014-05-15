<?php

function poolBBDD() {
    $bd = new BaseDatos('192.168.1.190', 'alumno', 'alumno', 'SALPIMENTA');
    return $bd;
}




function crearArrayRecetas($resultado) {
    $array_receta = array();
    $i = 0;

    while ($fila = $resultado->fetch_row()) {
        $x = 0;
        
        $receta = new Receta();
        $receta->setCodigoReceta($fila[$x]);
        $x++;
        $receta->setCodigoUsuario($fila[$x]);
        $x++;
        $receta->setNombreReceta($fila[$x]);
        $x++;
        $receta->setAutorReceta($fila[$x]);
        $x++;
        $receta->setElaboracion( htmlspecialchars_decode($fila[$x]));
        $x++;
        $receta->setIngredientes( htmlspecialchars_decode($fila[$x]));
        $x++;
        $receta->setSugerencia( htmlspecialchars_decode($fila[$x]));
        $x++;
        $receta->setValoracion($fila[$x]);
        $x++;
        $receta->setTemporada($fila[$x]);
        $x++;
        $receta->setUrlReceta($fila[$x]);
        $x++;
        $receta->setFechaEntrada($fila[$x]);
        $x++;
        $receta->setNombreImg($fila[$x]);
        $x++;
        $receta->setImagen($fila[$x]);
        $x++;
        $receta->setTipoImg($fila[$x]);
        $x++;
        $receta->setCategoriaReceta($fila[$x]);
        $x++;

        $array_receta[$i] = $receta;
        $i++;
    }
    return $array_receta;
}
