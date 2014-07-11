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