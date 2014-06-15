<div class="info-section blogs">
    <div class="title-section text-blogs">
        <h1><?= $seccion ?></h1>
    </div>
    <div class="sort">
        <select>
            <option>Ordenar por</option>
            <option value="tipo">Tipo</option>
            <option value="fav">Favoritos</option>
        </select>
    </div>
</div>
<?php
for ($x = 0; $x < count($blogs); $x++) {
    ?>
    <article class="box-vblog ">
        <header class="blogs">
            <h3><?= $blogs[$x]->getTitulo() ?></h3>
        </header>
        <section>
            <div class="vblog-picture">
                <figure>
                    <a href=""><img src="data:image/jpeg;base64,<?= $blogs[$x]->getImagen() ?>" alt=""></a>
                </figure>
                <div class="rating-box">
                    <div data-idblog="<?= $blogs[$x]->getCodigo() ?>" data-tipo="blog" class="rateit" data-rateit-value="<?= $blogs[$x]->getValoracion() ?>" ></div>
                    <?php
                    if ($_SESSION["usuario"][0]->comprobarFav($blogs[$x]->getCodigo())) {
                        ?> 
                        <div class="heart"><a href="#" data-favorito="0" data-idBlog="<?= $blogs[$x]->getCodigo() ?>" ><span class="icon-heart" ></span></a></div>
                        <?php
                    } else {
                        ?>
                        <div class="heart"><a href="#" data-favorito="1" data-idBlog="<?= $blogs[$x]->getCodigo() ?>"><span class="icon-heart2" ></span></a></div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="vblog-description">
                <p><?= $blogs[$x]->getDescripcion() ?></p>
                <a href="<?= $blogs[$x]->getLink() ?>" target="_blank">Entrar</a>
            </div>
        </section>
    </article>
    <?php
}
?>

<script type ="text/javascript">
    //we bind only to the rateit controls within the products div
    $('.rateit').bind('rated reset', function(e) {
        var ri = $(this);
        //if the use pressed reset, it will get value: 0 (to be compatible with the HTML range control), we could check if e.type == 'reset', and then set the value to  null .
        var value = ri.rateit('value');
        var idblog = ri.data('idblog'); // if the product id was in some hidden field: ri.closest('li').find('input[name="productid"]').val()
        var tipo = ri.data('tipo');
        //maybe we want to disable voting?
        //ri.rateit('readonly', true);
        $.ajax({
            url: '/index.php?&url=valoracionControler', //your server side script
            data: {id: idblog, value: value, tipo: tipo}, //our data
            type: 'POST',
//            success: function(data) {
//                $("#respuesta").append("<div class='alert alert-warning'><strong>Mensaje</strong> " + data + " </div>");
//                console.log(data.id + data.value);
//            },
            error: function(jxhr, msg, err) {
                $("#respuesta").append("<div class='alert alert-danger'><strong>msg</strong> Ocurrio un error inesperado </div>");
            }
        });
    });
</script>

<script>
    $("a").click(function() {
        var anadir = $(this);

        var value = anadir.data('favorito');
        var idBlog = anadir.data('idblog');

        $.ajax({
            type: 'POST',
            url: '/index.php?&url=favoritoControler',
            data: {id: idBlog, value: value},
            error: function(jxhr, msg, err) {
                $('#response').append('<li style="color:red">' + jxhr + msg + err + '</li>');
            }
        });
    });
</script>





