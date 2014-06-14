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

for ($k = 0; $k < count($recetasOrdenadas); $k++) {
        $seccion[$k] = new Seccion(RecoverCat::numeroSeccion($recetasOrdenadas[$k][0]->getCategoriaReceta()));
}


$view = new View("editarRecetaView", array("seccion" => $seccion, "recetas" => $recetasOrdenadas,"zona" => $zona));
$view->execute();

