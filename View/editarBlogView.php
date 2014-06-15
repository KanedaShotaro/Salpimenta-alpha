<div class="info-section">
    <div class="title-section">
        <h1>Editar mis Blogs</h1>
    </div>
</div>

<?php
$y = 0;
while ($y < count($blogs)) {
    ?>
    <article class="box-my-recipe">

        <header class="aperitivos text-aperitivos">
            <h2><?= $blogs[$y][0]->getCategoria() ?></h2>
        </header>
        <!-- <div class="wrap-boxes"> -->
            <?php
            for ($x = 0; $x < count($blogs[$y]); $x++) {
                ?>
                <article class="box-vblog ">
                    <header class="blogs">
                        <h3><?= $blogs[$y][$x]->getTitulo() ?></h3>
                    </header>
                    <section>
                        <div class="vblog-picture">
                            <figure>
                                <a href=""><img src="data:image/jpeg;base64,<?= $blogs[$y][$x]->getImagen() ?>" alt=""></a>
                            </figure>
                            <div class="rating-box">
                                <div class="rating rateit" data-rateit-readonly="true" data-rateit-value="<?= $blogs[$y][$x]->getValoracion() ?>" > </div>

                                <?php
                                if ($_SESSION["usuario"][0]->comprobarFav($blogs[$y][$x]->getCodigo())) {
                                    ?> 
                                    <div class="heart"><a href="#" data-favorito="0" data-idBlog="<?= $blogs[$y][$x]->getCodigo() ?>" ><span class="icon-heart" ></span></a></div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="heart"><a href="#" data-favorito="1" data-idBlog="<?= $blogs[$y][$x]->getCodigo() ?>"><span class="icon-heart2" ></span></a></div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="vblog-description">
                            <p><?= $blogs[$y][$x]->getDescripcion() ?></p>
                            <a href="<?= $blogs[$y][$x]->getLink() ?>" target="_blank">Entrar</a>
                        </div>
                    </section>
                </article>
         <!--   </div> -->
            <?php
        }
        $y++;
        ?>
    </article>
    <?php
}
?>


