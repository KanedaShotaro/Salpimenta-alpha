<?php
if (isset($_GET["zona"])) {
    $zona = $_GET["zona"];
    if ($_GET["zona"] == "misalpimenta") {
        $misalpimenta = "activo-list-option";
    } else if ($_GET["zona"] == "explora") {
        $explora = "activo-list-option";
    }else{
        $blogs = "activo-list-option";
    }
} else {
    $zona = "explora";
    $explora = "activo-list-option";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="/View/css/rateit.css">
        <link rel="stylesheet" href="/View/css/alerts.css"> 
        <!-- <link rel="stylesheet" href="/View/css/offcanvas.css"> -->
        <link rel="stylesheet" href="/View/css/main.css"/>
        <link rel="stylesheet" href="/View/css/icomoon.css"/>

        <script src="/View/js/jquery.rateit.js"></script>
        <script src="/View/js/jquery-2.1.0.min.js"></script>
        <script src="/View/js/bootstrap.js"></script>
        <script src="/View/js/jquery.rateit.js"></script>
        <script src="/View/js/jquery-ui.js"></script>

    </head>
    <body>

        <header class="header">
            <div class="wrap-header">
                <div class="logo">
                    <figure>
                        <a href="#"><img src="/View/img/logo.png" alt="Logo Salpimenta" width="88" height="88"/></a>
                    </figure>
                    <h1>salpi<br><span>menta</span><span class="beta">Beta</span></h1>
                </div>
                <div class="options">
                    <div class="list-options">
                        <!--elejir colores hover.-->
                        <ul>
                            <li class="<?= $misalpimenta ?>" ><a  href="/index.php?url=seccionesControler&zona=misalpimenta">Mi salpimenta</a></li>
                            <li class="<?= $explora ?>"><span></span><a  href="/index.php?url=seccionesControler&zona=explora">Explorar</a><span></span></li>
                            <li class="<?= $blogs ?>"><a  href="/index.php?url=blogsControler&zona=blogs">Blogs</a></li>
                        </ul>
                        <a href="/index.php?url=subirRecetaControler&zona=<?= $zona ?>">Subir receta...</a>
                    </div>
                    <div class="search">
                        <form action="/index.php?url=buscadorControler&zona=<?= $zona ?>" method="post">
                            <input type="search" name="tags" placeholder="Buscar">
                        </form>
                    </div>
                </div>
                <div class="user">
                    <figure>
                        <img src="data:image/jpeg;base64,<?= $_SESSION["usuario"][0]->getImagen() ?>" alt="insert yout face here" />
                    </figure>
                    <div>
                        <ul>
                            <li class="user-perfil"><a href="#"><?= $_SESSION["usuario"][0]->getNombre() ?></a>
                                <ul class="menu-perfil">
                                    <li><a href="/index.php?url=miPerfilControler&zona=<?= $zona ?>">Mi ficha</a></li>
                                    <li><a href="/index.php?url=subirBlogControler&zona=<?= $zona ?>">Subir Blog</a></li>
                                    <li><a  href="/index.php?url=ajustesControler&zona=<?= $zona ?>">Ajustes</a></li>
                                    <li><a href="/index.php?url=editarRecetasControler&zona=<?= $zona ?>">Ver/Editar Recetas</a></li>
                                    <li><a href="/index.php?url=editarBlogControler&zona=<?= $zona ?>">Ver/Editar Blogs</a></li>
                                    <li><a href="/index.php?url=salirSesionControler&zona=<?= $zona ?>">salir</a></li>
                                </ul>
                            </li>
                            <li><a href="#">5 recetas</a></li>
                        </ul>       
                    </div>
                </div>
            </div>
        </header>

        <?= $menu_content ?>

        <?= $alerts_content ?>

        <?= $tpl_content ?>
    </div>  <!-- este div es correcto, viende del wrap en $menu_content --> 
    <footer >
        <div class="wrap-footer">
            <div class="wrap-social">
                <div class="followus">
                    <h3>Siguenos en</h3>
                </div>
                <div class="icons-social">
                    <ul>
                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                        <li><a href="#"><span class="icon-googleplus"></span></a></li>
                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                        <li><a href="#"><span class="icon-paypal"></span></a></li>
                        <li><a href="#"><span class="icon-tumblr"></span></a></li>
                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="info-page">
                <ul class="first-info">
                    <li>Salpimenta, S.L</li>
                    <li><span></span></li>
                    <li>C010203040</li>
                    <li><span></span></li>
                    <li>c/ Agustini 89, 1ºC</li>
                    <li><span></span></li>
                    <li>28009 Madrid</li>
                </ul>
                <ul class="second-info">
                    <li>2014 © Salpimenta,S.L</li>
                    <li><span></span></li>
                    <li>Aviso Legal</li>
                    <li><span></span></li>
                    <li>Politica de Privacidad</li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>


