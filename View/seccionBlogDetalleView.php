<div class="info-section blogs">
    <div class="title-section text-blogs">
        <h1><?= $seccion ?></h1>
    </div>
    <div class="sort">
        <select>
            <option>Ordenar por</option>
            <option value="tipo">Tipo</option>
            <option value="fav">Favoritos</option>
        </select>
    </div>
</div>
<?php
for ($x = 0; $x < count($blogs); $x++) {
    ?>
    <article class="box-vblog ">
        <header class="blogs">
            <h3><?= $blogs[$x]->getTitulo() ?></h3>
        </header>
        <section>
            <div class="vblog-picture">
                <figure>
                    <a href=""><img src="data:image/jpeg;base64,<?= $blogs[$x]->getImagen() ?>" alt=""></a>
                </figure>
                <div class="rating-box">
                    <div class="rateit rating" data-rateit-readonly="true" data-rateit-value="2.5"></div>
                    <div class="heart"><span class="icon-heart"></span></div>
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
?>





