<?php

Block::test();

function recetasUsuario($usuario) {
    $recetaBd = new RecetaBd();
    $totalSec = 12;

    $recetasUsuario = $recetaBd->recuperarRecetasUsuario($usuario->getCodigoUsuario());

    if (count($recetasUsuario) == 0) {
        return array();
    } else {
        $y = 1;
        while ($y <= $totalSec) {
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
    }

    return array("recetas" => $recetasOrdenadas, "seccion" => $seccion);
}

function blogsUsuario($usuario) {

    $blogBd = new BlogBd();
    $totalSec = 2;


    $BlogsUsuario = $blogBd->recuperarBlogsUsuario($usuario->getCodigoUsuario());

    if (count($BlogsUsuario) == 0) {
        return array();
    } else {

        $y = 1;
        while ($y <= $totalSec) {
            for ($x = 0; $x < count($BlogsUsuario); $x++) {
                if ($BlogsUsuario[$x]->getCategoria() == $y) {
                    $BlogsUsuario[$x]->setCategoria(RecoverCat::nombreSeccionBlog($y));
                    $BlogsOrdenados[$y][$x] = $BlogsUsuario[$x];
                }
            }
            $y++;
        }

        sort($BlogsOrdenados);
        for ($r = 0; $r < count($BlogsOrdenados); $r++) {
            sort($BlogsOrdenados[$r]);
        }

        return $BlogsOrdenados;
    }
}

if (!isset($_GET["codigoReceta"])) {
    $usuario = $_SESSION["usuario"][0];
}else{
    $usuarioBd = new UsuarioBd;
    $usuario = $usuarioBd->recuperarAutorReceta($_GET["codigoReceta"]);
    
}

$recetasInfo = recetasUsuario($usuario[0]);
$blogs = blogsUsuario($usuario[0]);



$view = new View("miFichaView", array("usuario" => $usuario[0], "recetas" => $recetasInfo["recetas"], "seccion" => $recetasInfo["seccion"], "blogs" => $blogs));
$view->execute();

