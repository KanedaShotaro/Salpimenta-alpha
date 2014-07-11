<?php

abstract class AbstractFun {

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
    function introducirImg($img) {
        $nombre = $img['name'];
        $imagen_temporal = $img['tmp_name'];
        $type = $img['type'];
        //archivo temporal en binario
        $itmp = fopen($imagen_temporal, 'r+b');
        $imagen = fread($itmp, filesize($imagen_temporal));
        fclose($itmp);
        //escapando los caracteres
        $imagen = base64_encode($imagen);
        $imagen = mysql_real_escape_string($imagen);
        
        $this->setImagen($imagen);
        $this->setNombreImg($nombre);
        $this->setTipoImg($type);
    }
    /*Old introducir imagen*/
    /*
    function introducirImg($img) {
        $nombre = $img['name'];
        $imagen_temporal = $img['tmp_name'];
        $type = $img['type'];
        //archivo temporal en binario
        $itmp = fopen($imagen_temporal, 'r+b');
        $imagen = fread($itmp, filesize($imagen_temporal));
        fclose($itmp);
        //escapando los caracteres
        $imagen = base64_encode($imagen);
        $imagen = mysql_real_escape_string($imagen);
        
        print_r($img);
        echo $nombre;
        echo $imagen_temporal;
        echo 'hola';
        exit;

        $this->setImagen($imagen);
        $this->setNombreImg($nombre);
        $this->setTipoImg($type);
    }
    */
}
