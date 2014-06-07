<div class="container">
    <div class="row">
        <h1><?= $receta->getNombreReceta() ?></h1>
        <h3><?= $seccion ?></h3>
        <figure><img src="data:image/jpeg;base64,<?= $receta->getImagen() ?>" alt=""></figure>
        <p> <?= $receta->getValoracion() ?></p>
        <p> <?= $receta->getValUsuario() ?></p>

        <h3><?= $autor->getNombre() ?></h3>
         <figure><img src="data:image/jpeg;base64,<?= $autor->getImagen() ?>" alt=""></figure>

        <h2>Ingredientes</h2>
        <article>
            <?= $receta->getIngredientes() ?>
        </article>
        <h2>Elaboración</h2>
        <article>
            <?= $receta->getElaboracion() ?>
        </article>
        <h2>Sugerencia</h2>
        <article>
            <?= $receta->getSugerencia() ?>
        </article>     
    </div>
</div>
