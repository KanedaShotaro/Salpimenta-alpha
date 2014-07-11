<?php
$y = 0;

if (count($recetas) != 0) {
    ?>
    <h2> Recetas encontradas </h2>
    <?php
    while ($y < count($recetas)) {
        ?>
        <?php
        for ($x = 0; $x < count($recetas[$y]); $x++) {
            ?>
            <section class="box-receta aperitivos">

                <header class="title-box ">
                    <h2><?= $recetas[$y]->getNombreReceta() ?></h2>
                </header>
                <div class="image-box">
                    <figure>
                        <a href="/index.php?url=recetaDetalleControler&seccion=aperitivos&urlReceta=<?= $recetas[$y]->getUrlReceta() ?>&zona=<?= $zona ?>"><img src="data:image/jpeg;base64,<?= $recetas[$y]->getImagen() ?>" alt="">
                        </a>
                    </figure>
                </div>
                <div class="rating-box">
                    <div class="rating rateit" data-rateit-readonly="true" data-rateit-value="<?= $recetas[$y]->getValoracion() ?>" > </div>
                    <?php
                    if ($_SESSION["usuario"][0]->comprobarFav($recetas[$y]->getCodigo())) {
                        ?> 
                        <div class="heart"><a href="#" data-favorito="0" data-tipo="receta" data-idReceta="<?= $recetas[$y]->getCodigo() ?>" ><span class="icon-heart" ></span></a></div>
                        <?php
                    } else {
                        ?>
                        <div class="heart"><a href="#" data-favorito="1" data-tipo="receta" data-idReceta="<?= $recetas[$y]->getCodigo() ?>"><span class="icon-heart2" ></span></a></div>
                        <?php
                    }
                    ?>
                </div>

            </section>
            <?php
        }
        $y++;
        ?>
        <?php
    }
}

if (count($blogs) != 0) {
    $y = 0;
    ?>
    <h2> Blogs encontrados </h2>
    <?php
    while ($y < count($blogs)) {
        ?>
        <?php
        for ($x = 0; $x < count($blogs[$y]); $x++) {
            ?>
            <article class="box-vblog ">
                <header class="blogs">
                    <h3><?= $blogs[$y]->getTitulo() ?></h3>
                </header>
                <section>
                    <div class="vblog-picture">
                        <figure>
                            <a href=""><img src="data:image/jpeg;base64,<?= $blogs[$y]->getImagen() ?>" alt=""></a>
                        </figure>
                        <div class="rating-box">
                            <div data-idblog="<?= $blogs[$y]->getCodigo() ?>" data-tipo="blog" class="rateit" data-rateit-value="<?= $blogs[$y]->getValoracion() ?>" ></div>
                            <?php
                            if ($_SESSION["usuario"][0]->comprobarFav($blogs[$y]->getCodigo())) {
                                ?> 
                                <div class="heart"><a href="#" data-favorito="0" data-idBlog="<?= $blogs[$y]->getCodigo() ?>" ><span class="icon-heart" ></span></a></div>
                                <?php
                            } else {
                                ?>
                                <div class="heart"><a href="#" data-favorito="1" data-idBlog="<?= $blogs[$y]->getCodigo() ?>"><span class="icon-heart2" ></span></a></div>
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
        $y++;
        ?>
        <?php
    }
}
?>







