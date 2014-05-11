<?php
echo "seccionView.php/";
?>

<h2><?= $seccion ?></h2>

<?php
for ($x = 0; $x < count($recetas); $x++) {
    ?>
    <article>
        <h3> <?= $recetas[$x]->getNombreReceta() ?></h3>
        <figure><a href="/Salpimenta-backend/index.php?url=recetaDetalle&seccion=<?= $seccion ?>&urlReceta=<?= $recetas[$x]->getUrlReceta() ?>"><img src="data:image/jpeg;base64,<?= $recetas[$x]->getImagen() ?>" alt=""></a></figure>
        <p> <?= $recetas[$x]->getValoracion() ?></p>
        <p> añadir a favoritos </p>
    </article>
    <?php
}
?>     
