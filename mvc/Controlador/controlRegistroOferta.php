<?php

echo "controlRegistroOferta/";
//include '/var/www/DescuentingBeta1/mvc/Vista/funcionesVista.php';
include '/var/www/Salpimenta-backend/mvc/Modelo/BaseDatos.php';
include '/var/www/Salpimenta-backend/mvc/Modelo/Oferta.php';


if (!empty($_POST[titulo])) {
    // creamos el objeto base de datos
    $bd = poolBBDD();
    // establecemos conexión
    if ($bd->establecer_conexion()) {
        echo "conexion establecida <br/>";
        //creamos el objeto Oferta con los datos
        $oferta = new Receta($nombreReceta, $autorReceta, $elaboracion, $ingredientes, $sugerencia, $valoracion, $temporada, $urlImagen, $fechaEntrada);

        $nombre = $_FILES['img']['name'];
        $imagen_temporal = $_FILES['img']['tmp_name'];
        $type = $_FILES['img']['type'];
        //archivo temporal en binario
        $itmp = fopen($imagen_temporal, 'r+b');
        $imagen = fread($itmp, filesize($imagen_temporal));
        fclose($itmp);
        //escapando los caracteres
        $imagen = base64_encode($imagen);
        $imagen = mysql_real_escape_string($imagen);


        $oferta->setImagen($imagen);
        $oferta->setNombreImagen($nombre);
        $oferta->setTipoImg($type);

        if ($bd->insertar_oferta($oferta)) {
            if ($bd->insertar_tags_oferta($_POST[tags], $oferta->getCodigo())) {
                header("Location: /DescuentingBeta1/mvc/Vista/index.php");
            } else {
                alert("danger", "ERROR", "Oferta no introducida");
            }
        } else {
            alert("danger", "ERROR", "Oferta no introducida");
        }
    } else {
        echo "fallo en la conexión";
    }
}