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
        <style>

        </style>
    </head>

    <body class="fondo-pantalla">
        <header>
            <div class="wrap-header ">
                <div class="logo bienvenida">
                    <figure>
                        <a href="#"><img src="/View/img/logo.png" alt="Logo Salpimenta" width="88" height="88"/></a>
                    </figure>
                    <h1>salpi<br><span>menta</span><span class="beta">Beta</span></h1>
                </div>
            </div>
        </header>
        <nav></nav>
        <section class="wrap-main">

            <div class="wrap-welcome">
                <div class="form-login">
                    <h1>Bienvenido</h1>
                    <form action="/index.php?url=loginUsuarioControler" method="POST">
                        <div>
                            <input type="text" name="email" placeholder="Nombre de usuario">
                            <input type="password" name="password" placeholder="Contraseña">
                            <input type="checkbox" id="check" name="check" ><label for="check">Recordar contraseña<a href="#">¿la has olvidado?</a></label>
                            <div class="submit">
                                <input type="submit" value="Entrar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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

        </section>
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