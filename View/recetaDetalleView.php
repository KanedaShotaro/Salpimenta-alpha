
<div class="info-section <?= $seccion->getCss() ?>">
    <div class="title-section text-<?= $seccion->getCss() ?>">
        <h1><?= $receta->getNombreReceta() ?></h1>
        <span><?= $seccion->getNombre() ?></span>
    </div>
</div>
<article class="wrap-detail">
    <div class="wrap-autor">
        <div class="image-receta">
            <figure>
                <img src="data:image/jpeg;base64,<?= $receta->getImagen() ?>" alt="">
            </figure>
            <div class="rating-box <?= $seccion->getCss() ?>">
                <?php
                if ($_SESSION["usuario"][0]->comprobarFav($receta->getCodigo())) {
                    ?> 
                    <div class="heart"><a href="#" data-favorito="0" data-tipo="receta" data-idReceta="<?= $receta->getCodigo() ?>" ><span onclick="this.className='icon-heart2'; return false;" class="icon-heart" ></span></a></div>
                    <?php
                } else {
                    ?>
                    <div class="heart"><a href="#" data-favorito="1" data-tipo="receta" data-idReceta="<?= $receta->getCodigo() ?>"><span onclick="this.className='icon-heart'; return false;" class="icon-heart2" ></span></a></div>
                    <?php
                }
                ?>
            </div>
        </div>
        <section class="olakase">
            <div class="voto-general">
                <div class="voto-general-num"><?= $receta->getValoracion() ?></div>
                <div data-idreceta="<?= $receta->getCodigo() ?>" data-tipo="receta" class="rateit" data-rateit-value="<?= $receta->getValUsuario() ?>" ></div>
            </div>
            <div class="box-autor">
                <header class="title-autor">
                    <span>Autor:</span>
                    <h2><a href="/index.php?url=miPerfilControler&zona=<?= $zona ?>&codigoReceta=<?= $receta->getCodigo()?>"><?= $autor->getNombre() ?> <?= $autor->getApellido1() ?></a></h2>
                </header>
                <div class="image-autor aperitivos">
                    <figure>
                        <a href="/index.php?url=miPerfilControler&zona=<?= $zona ?>&codigoReceta=<?= $receta->getCodigo()?>"><img src="data:image/jpeg;base64,<?= $autor->getImagen() ?>" alt="imagen autor"></a>
                    </figure>
                </div>
            </div>
        </section>

    </div>

    <article class="description-receta">
        <article class="tab-receta">
            <header>
                <h3>Ingredientes</h3>
                <span class="icono-salpimenta"><img src="./View/img/salpimenta-icono.jpg"></span>
            </header>
            <section>
                <?= $receta->getIngredientes() ?>
            </section>
        </article>
        <article class="tab-receta">
            <header>
                <h3>Elaboracion </h3>
                <span class="icon-food"></span>
            </header>
            <section>
                <?= $receta->getElaboracion() ?>
            </section>
        </article>
        <article class="tab-receta">
            <header>
                <h3>Sugerencia </h3>
                <span class="icon-eye"></span>
            </header>
            <section>
                <?= $receta->getSugerencia() ?>
            </section>
        </article>
    </article>
</article>




<script type ="text/javascript">
    //we bind only to the rateit controls within the products div
    $('.rateit').bind('rated reset', function(e) {
        var ri = $(this);
        //if the use pressed reset, it will get value: 0 (to be compatible with the HTML range control), we could check if e.type == 'reset', and then set the value to  null .
        var value = ri.rateit('value');
        var idreceta = ri.data('idreceta'); // if the product id was in some hidden field: ri.closest('li').find('input[name="productid"]').val()
        var tipo = ri.data('tipo');
        //maybe we want to disable voting?
        //ri.rateit('readonly', true);
        $.ajax({
            url: '/index.php?&url=valoracionControler', //your server side script
            data: {id: idreceta, value: value, tipo: tipo}, //our data
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
        var idReceta = anadir.data('idreceta');
        var tipo = anadir.data('tipo');

        $.ajax({
            type: 'POST',
            url: '/index.php?&url=favoritoControler',
            data: {id: idReceta, value: value, tipo: tipo},
            error: function(jxhr, msg, err) {
                $('#response').append('<li style="color:red">' + jxhr + msg + err + '</li>');
            }
        });
    });
</script>
