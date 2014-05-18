

<?php
if (!empty($alert)) {
    ?>
    <div class="alert alert-<?= $alert->getTypeAlert() ?>">
        <strong><?= $alert->getTitleAlert() ?></strong>
        <?= $alert->getContentAlert() ?>
    </div>
    <?php
}
?>