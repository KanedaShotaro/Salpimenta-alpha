<div class="wrap-perfil">
    <div class="panel-perfil">
        <figure><img src="data:image/jpeg;base64,<?= $usuario->getImagen() ?>" alt=""></figure>
        <div class="info-perfil">
            <h1><?= $usuario->getNombre() ?> <?= $usuario->getApellido1() ?></h1>
            <div class="logros">
                <h3>Ultimos logros ganados</h3>
                <div class="logro">
                    <img src="/View/img/logro.png" alt="">
                </div>
                <div class="logro">
                    <img src="/View/img/logro2.png" alt="">
                </div>
                <div class="logro">
                    <img src="/View/img/logro3.png" alt="">
                </div>
                <div class="logro">
                    <img src="/View/img/logro.png" alt="">
                </div>
            </div>
            <a href="#">ver todos los logros</a>
        </div>
    </div>
    <article class="box-section-perfil">
         <header> <h2>Recetas subidas</h2></header>
        <?php
        $y = 0;
        while ($y < count($recetas)) {
            ?>
            <article class="box-my-recipe">

                <header class="<?= $seccion[$y]->getCss() ?> text-<?= $seccion[$y]->getCss() ?>">
                    <h2><?= $seccion[$y]->getNombre() ?></h2>
                </header>

                <div class="wrap-boxes">
                    <?php
                    for ($x = 0; $x < count($recetas[$y]); $x++) {
                        ?>
                        <section class="box-receta <?= $seccion[$y]->getCss() ?>">
                            <header class="title-box ">
                                <h2><?= $recetas[$y][$x]->getNombreReceta() ?></h2>
                            </header>
                            <div class="image-box">
                                <figure>
                                    <a href="/index.php?url=recetaDetalleControler&seccion=<?= $seccion[$y]->getCss() ?>&urlReceta=<?= $recetas[$y][$x]->getUrlReceta() ?>&zona=<?= $zona ?>" ><img src="data:image/jpeg;base64,<?= $recetas[$y][$x]->getImagen() ?>" alt="">
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
    </article>

    <?php if (count($blogs) != 0) {
        ?>
        <article class="box-section-perfil">
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
        </article>
        <?php }
    ?>


</div>

