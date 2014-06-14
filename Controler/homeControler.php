<?php

if (isset($_SESSION["usuario"])) {
    header("Location: ./index.php?url=seccionesControler&zona=misalpimenta");
} else {
    include './View/homeView.php';
}




