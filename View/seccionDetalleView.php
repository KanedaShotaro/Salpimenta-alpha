<?php
if (isset($_GET["zona"])) {
    $zona = $_GET["zona"];
} else {
    $zona = "explora";
}
?>

<?php if ($zona == "misalpimenta") { ?>
    <div class="container">
        <div class="row">
            <h1><?= $seccion ?></h1>

            <?php
            for ($x = 0; $x < count($recetas); $x++) {
                ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="data:image/jpeg;base64,<?= $recetas[$x]->getImagen() ?>" alt="">
                        <div class="caption">
                            <h3><?= $recetas[$x]->getNombreReceta() ?></h3>
                            <p> <?= $recetas[$x]->getValoracion() ?></p>
                        </div>
                        <p> añadir a favoritos </p>
                        <p><a class="btn btn-primary" role="button" href="/Salpimenta-backend/index.php?url=recetaDetalleControler&seccion=<?= $seccion ?>&urlReceta=<?= $recetas[$x]->getUrlReceta() ?>&zona=misalpimenta"> Ir a la receta </a></p>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>   
    </div>
    </div>
<?php } else { ?>

    <div class="container">
        <div class="row">
            <h1><?= $seccion ?></h1>

            <?php
            for ($x = 0; $x < count($recetas); $x++) {
                ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="data:image/jpeg;base64,<?= $recetas[$x]->getImagen() ?>" alt="">
                        <div class="caption">
                            <h3><?= $recetas[$x]->getNombreReceta() ?></h3>
                            <p> <?= $recetas[$x]->getValoracion() ?></p>
                            <p> añadir a favoritos </p>
                            <p><a class="btn btn-primary" role="button" href="/Salpimenta-backend/index.php?url=recetaDetalleControler&seccion=<?= $seccion ?>&urlReceta=<?= $recetas[$x]->getUrlReceta() ?>"> Ir a la receta </a></p>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>   
        </div>
    </div>
<?php } ?>
