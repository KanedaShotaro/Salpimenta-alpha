
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="/Salpimenta-backend/View/css/rateit.css">
        <link rel="stylesheet" href="/Salpimenta-backend/View/css/bootstrap.min.css">
        <link rel="stylesheet" href="/Salpimenta-backend/View/css/offcanvas.css">

        <script src="/Salpimenta-backend/View/js/jquery.rateit.js"></script>

        <script src="/Salpimenta-backend/View/js/jquery-2.1.0.min.js"></script>
        <script src="/Salpimenta-backend/View/js/bootstrap.js"></script>
        <script src="/Salpimenta-backend/View/js/jquery.rateit.js"></script>
        <script src="/Salpimenta-backend/View/js/jquery-ui.js"></script>
    </head>
    <body>

        <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand" >Salpimenta Beta </div>
                    <div class="navbar-brand" ><?php echo $_SESSION["usuario"][0]->getNombre(); ?> </div>
                </div>
                <div class="collapse navbar-collapse">
                    <br>
                    <ul class="nav navbar-nav">
                        <li ><a href="/Salpimenta-backend/index.php?&url=seccionesControler&zona=misalpimenta"><h4>Mi Salpimenta</h4></a></li>
                        <li><a href="/Salpimenta-backend/index.php?url=seccionesControler"><h4>Explora</h4></a></li>
                        <li><a href="/Salpimenta-backend/index.php?url=blogsControler&zona=blogs"><h4>Blogs</h4></a></li>
                        <li><a href="/Salpimenta-backend/index.php?url=subirRecetaControler&zona=<?= $zona ?>">Subir Receta</a></li>
                        <li><a href="/Salpimenta-backend/index.php?url=subirBlogControler&zona=<?= $zona ?>">Subir Blog</a></li>
                        <li><a href="/Salpimenta-backend/index.php?url=ajustesControler&zona=<?= $zona ?>">ajustes</a></li>
                        <li><a href="/Salpimenta-backend/index.php?url=miPerfilControler&zona=<?= $zona ?>">mi Ficha</a></li>
                        <li><a href="/Salpimenta-backend/index.php?url=editarRecetasControler&zona=<?= $zona ?>">ver/editar recetas</a></li>
                        <li><a href="/Salpimenta-backend/index.php?url=salirSesionControler&zona=<?= $zona ?>">Descunectarse</a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </div><!-- /.navbar -->

        <?= $menu_content ?>

        <?= $alerts_content ?>

        <?= $tpl_content ?>

        <footer>
            <form action="/Salpimenta-backend/index.php?url=buscadorControler&zona=<?= $zona ?>" method="post">
                <input type="text" name="tags" id="tags"  placeholder="Busca una receta o un blog"><br/>
                <input type="submit" value="Buscar">
            </form>
            <p> Salpimenta 2014 </P>
        </footer>
    </body>
</html>


