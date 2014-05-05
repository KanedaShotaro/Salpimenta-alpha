<?php

echo "controlRegistroReceta/";
//include '/var/www/DescuentingBeta1/mvc/Vista/funcionesVista.php';
include '/var/www/Salpimenta-backend/mvc/Modelo/BaseDatos.php';
include '/var/www/Salpimenta-backend/mvc/Modelo/Receta.php';


if (!empty($_POST[nombre])) {
    // creamos el objeto base de datos
    $bd = poolBBDD();
    // establecemos conexión
    if ($bd->establecer_conexion()) {
        echo "conexion establecida <br/>";
        //creamos el objeto Oferta con los datos
        $receta = new Receta($_POST[nombre], $_POST[emailUsuario], $_POST[elaboracion], $_POST[ingredientes], $_POST[sugerencias], $_POST[temporada],$_POST[seccion]);
  
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


        $receta->setImagen($imagen);
        $receta->setNombreImg($nombre);
        $receta->setTipoImg($type);

        if ($bd->insertar_Receta($receta)) {
            echo "... aki ...";
            if ($bd->insertar_tags_receta($_POST[tags], $receta->getCodigoReceta())) {
                header("Location: /Salpimenta-backend/mvc/Vista/mi-salpimenta.php");
            } else {
               echo "Oferta no introducida";
            }
        } else {
            echo "Oferta no introducida";
        }
    } else {
        echo "fallo en la conexión";
    }
}