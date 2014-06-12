<?php
Block::test();
$usuario = $_SESSION["usuario"][0];
$recetaBd = new RecetaBd();
$totalSec = 12;

if (empty($_GET["zona"])) {
    $zona = "explora";
} else {
    $zona = $_GET["zona"];
}

$recetasUsuario = $recetaBd->recuperarRecetasUsuario($usuario->getCodigoUsuario());

$y = 1;
while ($y < $totalSec) {
    for ($x = 0; $x < count($recetasUsuario); $x++) {
        if ($recetasUsuario[$x]->getCategoriaReceta() == $y) {
            $recetasUsuario[$x]->setCategoriaReceta(RecoverCat::nombreSeccion($y));
            $recetasOrdenadas[$y][$x] = $recetasUsuario[$x];
        }
    }
    $y++;
}

sort($recetasOrdenadas);
for ($r = 0; $r < count($recetasOrdenadas); $r++) {
    sort($recetasOrdenadas[$r]);
}


$view = new View("editarRecetaView", array("recetas" => $recetasOrdenadas,"zona" => $zona));
$view->execute();

