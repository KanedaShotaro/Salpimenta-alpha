<h1> Estas en seccion blog detalle</h1>

<div class="container">
        <div class="row">
            <h1><?= $seccion ?></h1>

            <?php
            for ($x = 0; $x < count($blogs); $x++) {
                ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="data:image/jpeg;base64,<?= $blogs[$x]->getImagen() ?>" alt="">
                        <div class="caption">
                            <h3><?= $blogs[$x]->getTitulo() ?></h3>
                            <p> <?= $blogs[$x]->getValoracion() ?></p>
                            <p> <?= $blogs[$x]->getDescripcion() ?></p>
                            <p> añadir a favoritos </p>
                            <p><a class="btn btn-primary" role="button" href="<?= $blogs[$x]->getLink() ?>" target="_blank"> Ir al blog </a></p>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>   
        </div>
    </div>