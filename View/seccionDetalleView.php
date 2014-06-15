<div class="info-section text-<?= $seccion->getCss() ?>">
    <div class="title-section">
        <h1><?= $seccion->getNombre() ?></h1>
        <span><?= $zona ?></span>
    </div>
    <div class="sort">
        <select>
            <option>Ordenar por</option>
            <option value="tipo">Tipo</option>
            <option value="fav">Favoritos</option>
        </select>
    </div>
</div>

<div class="wrap-boxes">

    <?php
    for ($x = 0; $x < count($recetas); $x++) {
        ?>

        <section class="box-receta <?= $seccion->getCss() ?>">
            <header class="title-box ">
                <h2><?= $recetas[$x]->getNombreReceta() ?></h2>
            </header>
            <div class="image-box">
                <figure>
                    <a href="/index.php?url=recetaDetalleControler&seccion=<?= $seccion->getCss() ?>&urlReceta=<?= $recetas[$x]->getUrlReceta() ?>&zona=<?= $zona ?>"><img src="data:image/jpeg;base64,<?= $recetas[$x]->getImagen() ?>" alt="">
                    </a>
                </figure>
            </div>
            <div class="rating-box">
                <div class="rating rateit" data-rateit-readonly="true" data-rateit-value="<?= $recetas[$x]->getValoracion() ?>" > </div>
                <?php
                if ($_SESSION["usuario"][0]->comprobarFav($recetas[$x]->getCodigo())) {
                    ?> 
                    <div class="heart"><a href="#" data-favorito="0" data-tipo="receta" data-idReceta="<?= $recetas[$x]->getCodigo() ?>" ><span class="icon-heart" ></span></a></div>
                    <?php
                } else {
                    ?>
                    <div class="heart"><a href="#" data-favorito="1" data-tipo="receta" data-idReceta="<?= $recetas[$x]->getCodigo() ?>"><span class="icon-heart2" ></span></a></div>
                    <?php
                }
                ?>
            </div>
        </section>

        <?php
    }
    ?>   
</div>


<div class="pagination">
    <ul>
        <?php for ($x = 1; $x < $totalPaginas + 1; $x++) { ?>
            <?php if ($x == $pagina) { ?>
                <li><a href="/index.php?url=seccionDetalleControler&seccion=<?= $seccion->getCss() ?>&zona=<?= $zona ?>&pagina=<?= $x ?>"></a></li>
            <?php } ?>
            <?php if ($x != 1) {
                ?>
                <li><span></span></li>
                <?php }
            ?>
            <li><a href="/index.php?url=seccionDetalleControler&seccion=<?= $seccion->getCss() ?>&zona=<?= $zona ?>&pagina=<?= $x ?>"><?= $x ?></a></li>
        <?php } ?>
    </ul>
</div>

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



