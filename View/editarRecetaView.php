
<div class="info-section">
    <div class="title-section">
        <h1>Mis Recetas</h1>
    </div>
</div>
<?php
$y = 0;
while ($y < count($recetas)) {
    ?>
    <article class="box-my-recipe">

        <header class="<?=$seccion[$y]->getCss()?> text-<?=$seccion[$y]->getCss()?>">
            <h2><?= $seccion[$y]->getNombre() ?></h2>
        </header>

        <div class="wrap-boxes">
            <?php
            for ($x = 0; $x < count($recetas[$y]); $x++) {
                ?>
                <section class="box-receta <?=$seccion[$y]->getCss()?>">
                    <header class="title-box ">
                        <h2><?= $recetas[$y][$x]->getNombreReceta() ?></h2>
                    </header>
                    <div class="image-box">
                        <figure>
                            <a href="/index.php?url=recetaDetalleControler&seccion=<?= $recetas[$y][0]->getCategoriaReceta() ?>&urlReceta=<?= $recetas[$y][$x]->getUrlReceta() ?>&zona=<?= $zona ?>&editar=activo" ><img src="data:image/jpeg;base64,<?= $recetas[$y][$x]->getImagen() ?>" alt="">
                            </a>
                        </figure>
                    </div>
                    <div class="rating-box">
                        <div class="rating rateit" data-rateit-readonly="true" data-rateit-value="<?= $recetas[$y][$x]->getValoracion() ?>"></div>
                        <?php
                        if ($_SESSION["usuario"][0]->comprobarFav($recetas[$y][$x]->getCodigo())) {
                            ?> 
                            <div class="heart"><a href="#" data-favorito="0" data-idReceta="<?= $recetas[$y][$x]->getCodigo() ?>" ><span class="icon-heart2"></span></a></div>
                            <?php
                        } else {
                            ?>
                            <div class="heart"><a href="#" data-favorito="1" data-idReceta="<?= $recetas[$y][$x]->getCodigo() ?>"><span class="icon-heart"></span></a></div>
                                    <?php
                                }
                                ?>
                    </div>
                </section>
                <?php
            }
            $y++;
            ?>
        </div>

    </article>
    <?php
}
?>

