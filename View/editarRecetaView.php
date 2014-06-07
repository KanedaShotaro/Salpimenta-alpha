

<h2> Editar recetas </h2>

<div class="container">
    <?php
    $y = 0;
    while ($y < count($recetas)) {
        ?>

        <div class="row">
            <p><h3><?= $recetas[$y][0]->getCategoriaReceta() ?></h3><p>
                <?php
                for ($x = 0; $x < count($recetas[$y]); $x++) {
                    ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="data:image/jpeg;base64,<?= $recetas[$y][$x]->getImagen() ?>" alt="">
                        <div class="caption">
                            <h3><?= $recetas[$y][$x]->getNombreReceta() ?></h3>
                            <p> <?= $recetas[$y][$x]->getValoracion() ?></p>
                            <p> añadir a favoritos </p>
                            <p><a class="btn btn-primary" role="button" href="/Salpimenta-backend/index.php?url=recetaDetalleControler&seccion=<?= $recetas[$y][0]->getCategoriaReceta() ?>&urlReceta=<?= $recetas[$y][$x]->getUrlReceta() ?>&zona=misalpimenta&editar=activo"> Ir a la receta </a></p>
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
    ?>

</div>
