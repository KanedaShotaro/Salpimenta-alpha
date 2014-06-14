<div class="container">
    <div class="row">
        <h1><?= $receta->getNombreReceta() ?></h1>
        <h3><?= $seccion ?></h3>
        <figure><img src="data:image/jpeg;base64,<?= $receta->getImagen() ?>" alt=""></figure>
        <p> <?= $receta->getValoracion() ?></p>
        <p> <?= $receta->getValUsuario() ?></p>

        <h3><?= $autor->getNombre() ?></h3>
        <figure><img src="data:image/jpeg;base64,<?= $autor->getImagen() ?>" alt=""></figure>

        <h2>Ingredientes</h2>
        <article>
            <?= $receta->getIngredientes() ?>
        </article>
        <h2>Elaboración</h2>
        <article>
            <?= $receta->getElaboracion() ?>
        </article>
        <h2>Sugerencia</h2>
        <article>
            <?= $receta->getSugerencia() ?>
        </article>     
    </div>

    <fieldset>
        <legend>Editar Receta</legend>
        <form action="/Salpimenta-backend/index.php?url=registroRecetaControler" enctype="multipart/form-data" method="post" name="formReceta">
            <label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" value="<?= $receta->getNombreReceta() ?>"  placeholder="Titulo de tu Receta"><br/>
            <label for="ingredientes">Ingredientes: </label><textarea name="ingredientes"  id="ingredientes"  placeholder="Escribe la lista de ingredientes"> <?= $receta->getIngredientes() ?></textarea><br/>
            <label for="elaboracion">Elaboracion: </label><textarea name="elaboracion" id="elaboracion"  cols="30" rows="10" placeholder="Elaboracion de tu receta"><?= $receta->getElaboracion() ?></textarea><br/>
            <label for="sugerencias">Segerencias: </label><textarea name="sugerencias" id="sugerencias" placeholder="¿ Alguna sugerencia de preparación ?" cols="30" rows="10"> <?= $receta->getSugerencia() ?></textarea><br/>
            <label for="img">Sube tu Imagen: </label><input type="file" name="img" id="img"><br/>
            <input type="hidden" name="autor" id="autor" value="<?php echo $_SESSION["usuario"][0]->getNombre(); ?>">       
            <b> Temporada de tu Receta </b><br>
            <label for="V">Verano:</label> <input  <?= $checkedTemporada[1] ?>  type="radio" name="temporada" id="V" value="V"><br>
            <label for="I">Invierno:</label> <input <?= $checkedTemporada[2] ?> type="radio" name="temporada" id="I" value="I"><br>
            <label for="O">Otoño:</label> <input <?= $checkedTemporada[3] ?> type="radio" name="temporada" id="O" value="O"><br>
            <label for="P">Primavera:</label> <input <?= $checkedTemporada[4] ?> type="radio" name="temporada" id="P" value="P"><br>
            <b> Seccion de tu Receta </b><br>
            <label for="1">Aperitivos:</label> <input <?= $checkedSeccion[1] ?> type="radio" name="seccion" id="1" value="1"><br>
            <label for="2">Ensaladas y Verduras:</label> <input <?= $checkedSeccion[2] ?> type="radio" name="seccion" id="2" value="2"><br>
            <label for="3">Arroces y Cereales:</label> <input <?= $checkedSeccion[3] ?> type="radio" name="seccion" id="3" value="3"><br>
            <label for="4">Sopas y crema:</label> <input <?= $checkedSeccion[4] ?> type="radio" name="seccion" id="4" value="4"><br>
            <label for="5">pastas y pizzas :</label> <input <?= $checkedSeccion[5] ?> type="radio" name="seccion" id="5" value="5"><br>
            <label for="6">legumbres:</label> <input <?= $checkedSeccion[6] ?> type="radio" name="seccion" id="6" value="6"><br>
            <label for="7">carnes:</label> <input  <?= $checkedSeccion[7] ?>type="radio" name="seccion" id="7" value="7"><br>
            <label for="8">pescados y mariscos:</label> <input  <?= $checkedSeccion[8] ?>type="radio" name="seccion" id="8" value="8"><br>
            <label for="9">huevos:</label> <input  <?= $checkedSeccion[9] ?> type="radio" name="seccion" id="9" value="9"><br>
            <label for="10">setas y hongos:</label> <input <?= $checkedSeccion[10] ?> type="radio" name="seccion" id="10" value="10"><br>
            <label for="11">salsas:</label> <input <?= $checkedSeccion[11] ?> type="radio" name="seccion" id="11" value="11"><br>
            <label for="12">postres:</label> <input <?= $checkedSeccion[12] ?> type="radio" name="seccion" id="12" value="12"><br>
            <label for="tags">introduce etiquetas </label><input type="text" name="tags" id="tags">
            <input type="submit" onclick="Ok();" value="Subir Recetas">
        </form>
    </fieldset>

    <form action="/Salpimenta-backend/index.php?url=deleteRecetaControler&codigo=<?=$receta->getCodigo()?>&nombre=<?=$receta->getNombreReceta()?>" method="post">
        <label for="borrar"> Escribe el nombre de la Receta para borrarla </label><input type="text" name="borrar" id="borrar" ><br/>
        <input type="submit" value="Eliminar Receta">
    </form>

    <script src="/Salpimenta-backend/View/js/nicEdit.js" type="text/javascript"></script>
    <script type="text/javascript">
            bkLib.onDomLoaded(function() {
                new nicEditor({buttonList: ['hr', 'bold', 'italic', 'underline', 'strikethrough', 'left', 'center', '', 'ol', 'ul', 'removeformat', 'html']}).panelInstance('ingredientes');
                new nicEditor({buttonList: ['hr', 'bold', 'italic', 'underline', 'strikethrough', 'left', 'center', '', 'ol', 'ul', 'removeformat', 'html']}).panelInstance('elaboracion');
                new nicEditor({buttonList: ['hr', 'bold', 'italic', 'underline', 'strikethrough', 'left', 'center', '', 'ol', 'ul', 'removeformat', 'html']}).panelInstance('sugerencias');
            });
    </script>

    <script type="text/javascript">
        function Ok()
        {
            nicEditors.findEditor('ingredientes').saveContent();
            nicEditors.findEditor('elaboracion').saveContent();
            nicEditors.findEditor('sugerencias').saveContent();
            document.formReceta.submit();
        }</script>
</div>
