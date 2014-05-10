<?php
echo "seccionView.php/";
?>

<h2><?= $seccion ?></h2>

<?php
for ($x = 0; $x < count($array_recetas); $x++) {
    ?>
    <article>
        <h3> <?= $array_recetas[$x]->getNombreReceta() ?></h3>
        <figure><a href="/Salpimenta-backend/mvc/Controler/index.php?url=recetaDetalle&seccion=<?= $seccion ?>&urlReceta=<?= $array_recetas[$x]->getUrlReceta() ?>"><img src="data:image/jpeg;base64,<?= $array_recetas[$x]->getImagen() ?>" alt=""></a></figure>
        <p> <?= $array_recetas[$x]->getValoracion() ?></p>
        <p> añadir a favoritos </p>
    </article>
    <?php
}
?>     
