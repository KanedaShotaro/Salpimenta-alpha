<div class="container">
    <div class="row">
        <h1><?= $receta->getNombreReceta() ?></h1>
        <h3><?= $seccion ?></h3>
        <figure><img src="data:image/jpeg;base64,<?= $receta->getImagen() ?>" alt=""></figure>
        <p> <?= $receta->getValoracion() ?></p>
        <p> <?= $receta->getValUsuario() ?></p>
        <div data-idreceta="<?= $receta->getCodigoReceta() ?>" class="rateit" ></div>
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
</div>

<script type ="text/javascript">
    //we bind only to the rateit controls within the products div
    $('.rateit').bind('rated reset', function(e) {
        var ri = $(this);
        //if the use pressed reset, it will get value: 0 (to be compatible with the HTML range control), we could check if e.type == 'reset', and then set the value to  null .
        var value = ri.rateit('value');
        var idreceta = ri.data('idreceta'); // if the product id was in some hidden field: ri.closest('li').find('input[name="productid"]').val()

        //maybe we want to disable voting?
        //ri.rateit('readonly', true);
        $.ajax({
            url: '/Salpimenta-backend/index.php?&url=valoracionControler', //your server side script
            data: {id: idreceta, value: value}, //our data
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