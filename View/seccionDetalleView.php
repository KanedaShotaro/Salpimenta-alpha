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
                    <a href="/Salpimenta-backend/index.php?url=recetaDetalleControler&seccion=<?= $seccion ?>&urlReceta=<?= $recetas[$x]->getUrlReceta() ?>&zona=<?= $zona ?>"><img src="data:image/jpeg;base64,<?= $recetas[$x]->getImagen() ?>" alt="">
                    </a>
                </figure>
            </div>
            <div class="rating-box">
                <div class="rating rateit" data-rateit-readonly="true" data-rateit-value="<?= $recetas[$x]->getValoracion() ?>" > </div>
                <div class="heart"><a href=""><span class="icon-heart"></span></a></div>
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



