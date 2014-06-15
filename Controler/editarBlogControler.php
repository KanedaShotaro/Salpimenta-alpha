<?php

Block::test();
$usuario = $_SESSION["usuario"][0];
$blogBd = new BlogBd();
$totalSec = 2;


$BlogsUsuario = $blogBd->recuperarBlogsUsuario($usuario->getCodigoUsuario());

if (count($BlogsUsuario) == 0) {
    AlertAction::create("warning", "No tienes Blogs", "Para editar Blogs tienes que crear alguna ficha!");
    $request = new Request("");
    $request->execute();
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
  
    $view = new View("editarBlogView", array("blogs" => $BlogsOrdenados, "zona" => $_GET["zona"]));
    $view->execute();
}
