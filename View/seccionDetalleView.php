<div class="info-section text-aperitivos">
    <div class="title-section">
        <h1><?= $seccion ?></h1>
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

        <section class="box-receta aperitivos">
            <header class="title-box ">
                <h2><?= $recetas[$x]->getNombreReceta() ?></h2>
            </header>
            <div class="image-box">
                <figure>
                    <a href="/index.php?url=recetaDetalleControler&seccion=<?= $seccion ?>&urlReceta=<?= $recetas[$x]->getUrlReceta() ?>&zona=<?= $zona ?>"><img src="data:image/jpeg;base64,<?= $recetas[$x]->getImagen() ?>" alt="">
                    </a>
                </figure>
            </div>
            <div class="rating-box">
                <div class="rating rateit" data-rateit-readonly="true" data-rateit-value="<?= $recetas[$x]->getValoracion() ?>" > </div>

                <?php
                if ($_SESSION["usuario"][0]->comprobarFav($recetas[$x]->getCodigo())) {
                    ?> 
                    <div class="heart"><a href="#" data-favorito="0" data-idReceta="<?= $recetas[$x]->getCodigo() ?>" ><span class="icon-heart" ></span></a></div>
                    <?php
                } else {
                    ?>
                    <div class="heart"><a href="#" data-favorito="1" data-idReceta="<?= $recetas[$x]->getCodigo() ?>"><span class="icon-heart2" ></span></a></div>
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
        <li><a href="#">1</a></li>
        <li><span></span></li>
        <li><a href="#">2</a></li>
        <li><span></span></li>
        <li><a href="#">3</a></li>
        <li><span></span></li>
        <li><a href="#">4</a></li>
        <li><span></span></li>
        <li><a href="#">5</a></li>
        <li><span></span></li>
        <li><a href="#">6</a></li>
        <li><span></span></li>
        <li><a href="#">7</a></li>
        <li><span></span></li>
        <li><a href="#">8</a></li>
        <li><span></span></li>
        <li><a href="#">9</a></li>
    </ul>
</div>

<script>
    $("a").click(function() {
        var anadir = $(this);

        var value = anadir.data('favorito');
        var idReceta = anadir.data('idreceta');

        $.ajax({
            type: 'POST',
            url: '/index.php?&url=favoritoControler',
            data: {id: idReceta, value: value},
            error: function(jxhr, msg, err) {
                $('#response').append('<li style="color:red">' + jxhr + msg + err + '</li>');
            }
        });
    });
</script>



