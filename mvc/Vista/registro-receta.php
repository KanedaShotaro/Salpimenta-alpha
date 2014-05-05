<!DOCTYPE html>
<?php
include '/var/www/Salpimenta-backend/mvc/Modelo/Usuario.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <fieldset>
            <legend>Subir Receta</legend>
            <form action="/Salpimenta-backend/mvc/Controlador/controlRegistroReceta.php" enctype="multipart/form-data" method="post">
                <label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre"  placeholder="Titulo de tu Receta"><br/>
                <label for="descripcion1">Ingredientes: </label><textarea name="ingredientes" id="ingredientes"  placeholder="Escribe la lista de ingredientes"></textarea><br/>
                <label for="descripcion2">Elaboracion: </label><textarea name="elaboracion" id="elaboracion"  cols="30" rows="10" placeholder="Elaboracion de tu receta"></textarea><br/>
                <label for="sugerencias">Segerencias: </label><textarea name="sugerencias" id="Sugerencias" placeholder="¿ Alguna sugerencia de preparación ?" cols="30" rows="10"></textarea><br/>
                <label for="img">Sube tu Imagen: </label><input type="file" name="img" id="img"><br/>
               <input type="hidden" name="emailUsuario" id="emailUsuario" value="<?php echo $_SESSION[usuario][0]->getEmail(); ?>">       
                <b> Temporada de tu Receta </b><br>
                <label for="V">Verano:</label> <input type="checkbox" name="temporada" id="V" value="V"><br>
                <label for="I">Invierno:</label> <input type="checkbox" name="temporada" id="I" value="I"><br>
                <label for="O">Otoño:</label> <input type="checkbox" name="temporada" id="O" value="O"><br>
                <label for="P">Primavera:</label> <input type="checkbox" name="temporada" id="P" value="P"><br>
                <b> Seccion de tu Receta </b><br>
                <label for="1">Aperitivos:</label> <input type="checkbox" name="seccion" id="1" value="1"><br>
                <label for="2">Ensaladas y Verduras:</label> <input type="checkbox" name="seccion" id="2" value="2"><br>
                <label for="3">Arroces y Cereales:</label> <input type="checkbox" name="seccion" id="3" value="3"><br>
                <label for="4">Sopas y crema:</label> <input type="checkbox" name="seccion" id="4" value="4"><br>
                <label for="5">pastas y pizzas :</label> <input type="checkbox" name="seccion" id="5" value="5"><br>
                <label for="6">legumbres:</label> <input type="checkbox" name="seccion" id="6" value="6"><br>
                <label for="7">carnes:</label> <input type="checkbox" name="seccion" id="7" value="7"><br>
                <label for="8">pescados y mariscos:</label> <input type="checkbox" name="seccion" id="8" value="8"><br>
                <label for="9">huevos:</label> <input type="checkbox" name="seccion" id="9" value="9"><br>
                <label for="10">setas y hongos:</label> <input type="checkbox" name="seccion" id="10" value="10"><br>
                <label for="11">salsas:</label> <input type="checkbox" name="seccion" id="11" value="11"><br>
                <label for="12">postres:</label> <input type="checkbox" name="seccion" id="12" value="12"><br>
                <label for="tags">introduce etiquetas </label><input type="text" name="tags" id="tags">
                <input type="submit" value="Subir Recetas">
            </form>
        </fieldset>
    </body>
</html>
