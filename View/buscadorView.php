

<div class="container">
    <?php
    $y = 0;

    if (count($recetas) != 0) {
        ?>
        <h2> Recetas encontradas </h2>
        <?php
        while ($y < count($recetas)) {
            ?>
            <div class="row">
                <p><h3><?= RecoverCat::nombreSeccion($recetas[$y]->getCategoriaReceta()) ?></h3><p>
                    <?php
                    for ($x = 0; $x < count($recetas[$y]); $x++) {
                        ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="data:image/jpeg;base64,<?= $recetas[$y]->getImagen() ?>" alt="">
                            <div class="caption">
                                <h3><?= $recetas[$y]->getNombreReceta() ?></h3>
                                <p> <?= $recetas[$y]->getValoracion() ?></p>
                                <p> añadir a favoritos </p>
                                <p><a class="btn btn-primary" role="button" href="/index.php?url=recetaDetalleControler&seccion=<?= $recetas[$y]->getCategoriaReceta() ?>&urlReceta=<?= $recetas[$y]->getUrlReceta() ?>&zona=misalpimenta"> Ir a la receta </a></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                $y++;
                ?>
            </div>
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
            <div class="row">
                <p><h3><?= RecoverCat::nombreSeccionBlog($blogs[$y]->getCategoria()) ?></h3><p>
                    <?php
                    for ($x = 0; $x < count($blogs[$y]); $x++) {
                        ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="data:image/jpeg;base64,<?= $blogs[$y]->getImagen() ?>" alt="">
                            <div class="caption">
                                <h3><?= $blogs[$y]->getTitulo() ?></h3>
                                <p> <?= $blogs[$y]->getValoracion() ?></p>
                                <p> añadir a favoritos </p>
                                <p><a class="btn btn-primary" role="button" href="<?= $blogs[$y]->getLink() ?>"> Ir al blog </a></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                $y++;
                ?>
            </div>
            <?php
        }
    }
    ?>


</div>


