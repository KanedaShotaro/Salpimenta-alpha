<div class="container">
    <fieldset>
        <legend>Subir Blog</legend>
        <form action="/Salpimenta-backend/index.php?url=registroBlogControler" enctype="multipart/form-data" method="post" name="formBlog">
            <label for="nombre">Titulo del Blog: </label><input type="text" name="nombre" id="nombre"  placeholder="Titulo del Blog"><br/>
            <label for="link">Enlace al Blog: </label><input type="text" name="link" id="link"  placeholder="Escribe la dirección completa del blog"><br/>
            <label for="autor">Autor del Blog: </label><input type="text" name="autor" id="autor"  placeholder="Autor del blog"><br/>
            <label for="img">Sube una Imagen: </label><input type="file" name="img" id="img"><br/>
            <label for="descripcion">Descripción: </label><textarea name="descripcion" id="descripcion"  cols="30" rows="10" placeholder="Descripción del blog"></textarea><br/>
                  
            <b> Tipo de blog </b><br>
            <label for="B">Blog:</label> <input type="radio" name="tipoBlog" id="B" value="1"><br>
            <label for="V">Vlog:</label> <input type="radio" name="tipoBlog" id="V" value="2"><br>
            <label for="tags">introduce etiquetas </label><input type="text" name="tags" id="tags"><br>
            <input type="submit" onclick="Ok();" value="Subir Blog">
        </form>
    </fieldset>

    <script src="/Salpimenta-backend/View/js/nicEdit.js" type="text/javascript"></script>
    <script type="text/javascript">
                bkLib.onDomLoaded(function() {
                    new nicEditor({buttonList: ['hr', 'bold', 'italic', 'underline', 'strikethrough', 'left', 'center', '', 'ol', 'ul', 'removeformat', 'html']}).panelInstance('descripcion');
//                    new nicEditor({buttonList: ['hr', 'bold', 'italic', 'underline', 'strikethrough', 'left', 'center', '', 'ol', 'ul', 'removeformat', 'html']}).panelInstance('elaboracion');
//                    new nicEditor({buttonList: ['hr', 'bold', 'italic', 'underline', 'strikethrough', 'left', 'center', '', 'ol', 'ul', 'removeformat', 'html']}).panelInstance('sugerencias');
                });
    </script>

    <script type="text/javascript">
        function Ok()
        {
            nicEditors.findEditor('descripcion').saveContent();
//            nicEditors.findEditor('elaboracion').saveContent();
//            nicEditors.findEditor('sugerencias').saveContent();
            document.formBlog.submit();
        }</script>
</div>