<?php

Block::test();
$seccion = $_GET["seccion"];
$zona = $_GET["zona"];

$seccionDetalle = new SeccionBlogDetalle($zona,$seccion);
$seccionDetalle->execute();


