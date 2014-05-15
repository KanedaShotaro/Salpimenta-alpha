<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="/Salpimenta-backend/View/css/bootstrap.min.css">
        <link rel="stylesheet" href="/Salpimenta-backend/View/css/offcanvas.css">
    </head>
    <body>


        <?php if ($zona == "misalpimenta" or $_GET["zona"] == "misalpimenta") { ?>
              
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
                            <li ><a href="/Salpimenta-backend/index.php?&url=secciones&zona=misalpimenta"><h4>Mi Salpimenta</h4></a></li>
                            <li><a href="/Salpimenta-backend/index.php?url=secciones"><h4>Explora</h4></a></li>
                            <li><a href="#"><h4>Blogs</h4></a></li>

                            <li><a href="/Salpimenta-backend/index.php?url=subirReceta&zona=misalpimenta">Subir Receta</a></li>
                            <li><a href="#">ajuestes</a></li>
                            <li><a href="#">mi Ficha</a></li>
                            <li><a href="#">ver/editar recetas</a></li>
                            <li><a href="/Salpimenta-backend/index.php?url=salirSesion&zona=misalpimenta">Descunectarse</a></li>
                        </ul>
                    </div><!-- /.nav-collapse -->
                </div><!-- /.container -->
            </div><!-- /.navbar -->

        <?php } else { ?>
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
                            <li ><a href="/Salpimenta-backend/index.php?&url=secciones&zona=misalpimenta"><h4>Mi Salpimenta</h4></a></li>
                            <li><a href="/Salpimenta-backend/index.php?url=secciones"><h4>Explora</h4></a></li>
                            <li><a href="#"><h4>Blogs</h4></a></li>

                            <li><a href="/Salpimenta-backend/index.php?url=subirReceta">Subir Receta</a></li>
                            <li><a href="#">ajuestes</a></li>
                            <li><a href="#">mi Ficha</a></li>
                            <li><a href="#">ver/editar recetas</a></li>
                            <li><a href="/Salpimenta-backend/index.php?url=salirSesion">Descunectarse</a></li>
                        </ul>
                    </div><!-- /.nav-collapse -->
                </div><!-- /.container -->
            </div><!-- /.navbar -->

        <?php } ?>
        <?= $menu_content ?>

        <?= $alerts_content ?>

        <?= $tpl_content ?>

        <footer>
            <p> Salpimenta 2014 </P>
        </footer>
    </body>
</html>


