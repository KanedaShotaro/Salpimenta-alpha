
<section class="wrap-main">
    <div class="name-page"><h1><?= $zonaNombre ?></h1></div>
    <?php
    for ($x = 0; $x < count($seccion); $x++) {
        ?>
        <article class="section">
            <div class="title <?= $seccion[$x]->getCss() ?>">
                <a href="<?= $seccion[$x]->getLink() ?>&zona=<?= $zona ?>"><h2><?= $seccion[$x]->getNombre() ?></h2></a>
            </div>
            <div class="image">
                <figure>
                    <a href="<?= $seccion[$x]->getLink() ?>&zona=<?= $zona ?>"><img src="/Salpimenta-backend/View/img/<?= $seccion[$x]->getImagen() ?>.jpg" alt=""></a>
                </figure>
            </div>
        </article>
        <?php
    }
    ?>  
</section>
