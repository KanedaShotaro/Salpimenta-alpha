<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>SalPimenta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/View/css/alerts.css"/>
        <link rel="stylesheet" href="/View/css/normalize.css"/>
        <link rel="stylesheet" href="/View/css/icomoon.css"/>
        <link rel="stylesheet" href="/View/css/rateit.css"/>
        <link rel="stylesheet" href="/View/css/main.css"/>

        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>-->
        <script src="/View/js/plugins.js"></script>
        <script src="/View/js/main.js"></script>
        <script src="/View/js/jquery-2.1.0.min.js"></script>
        <script src="/View/js/jquery.rateit.js" type="text/javascript"></script>
    </head>
    <body class="background-register">
        <header>
            <div class="wrap-header">
                <div class="logo logo-register">
                    <figure>
                        <a href="#"><img src="img/logo.png" alt="Logo Salpimenta" width="88" height="88"/></a>
                    </figure>
                    <h1>salpi<br><span>menta</span><span class="beta">Beta</span></h1>
                </div>
                <div class="info-salpimenta">
                    <span>Bienvenido/a a</span>
                    <h1>Salpimenta</h1>
                    <span>Tu gestor de recetas online</span>
                </div>
            </div>
        </header>
         <?php
        if (isset($_SESSION["alert"])) {
            $alert = $_SESSION["alert"][0];
            ?>
            <div class="alert alert-<?= $alert->getTypeAlert() ?>">
                <strong><?= $alert->getTitleAlert() ?></strong>
                <?= $alert->getContentAlert() ?>
            </div>
            <?php
            unset($_SESSION["alert"]);
        }
        ?>
        <div class="wrap-main">
            <div class="wrap-form-register">
                <h3>Por favor rellena los siguientes campos para comenzar</h3>
                <div class="box-register">
                    <form action="/index.php?url=registroUsuarioControler" enctype="multipart/form-data" method="post">
                        <div class="style-boxes-register">
                            <h3>Sobre ti</h3>
                            <input type="text" name="nombre" placeholder="Nombre">
                            <input type="text" name="apellido1" placeholder="Primer apellido">
                            <input type="text" name="apellido2" placeholder="Segundo apellito">
                            <input type="text" name="platoFav" placeholder="Plato favorito">
                        </div>
                        <div class="style-boxes-register">
                            <h3>Fecha de Nacimiento</h3>
                            <input type="text" name="fecha" placeholder="DD/MM/AAAA">
                        </div>
                        <div class="style-boxes-register">
                            <h3>Tus datos de acceso</h3>
                            <input type="email" name="email" placeholder="Email">
                            <input type="email" name="confirm-email" placeholder="Confirma tu email">
                            <input type="password" name="password" placeholder="Contraseña">
                            <input type="password" name="confirm-password" placeholder="Confirmar contraseña">
                        </div>
                        <div class="style-boxes-register">
                            <h3>Sube tu imagen</h3>
                            <input type="file" name="img" >
                        </div>
                        <div class="style-boxes-conditions">
                            <input type="checkbox" name="check">
                            <span>Acepto las condiciones y al <a href="#">política de privacidad</a></span>
                        </div>
                        <div class="submit">
                            <input type="submit" value="¡Empezar!">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer>
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




