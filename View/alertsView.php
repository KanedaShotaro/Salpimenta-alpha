

<?php
if (!empty($_GET["typeAlert"])) {
    ?>
    <div class="alert alert-<?= $_GET["typeAlert"] ?>">
        <strong><?= $_GET["titleAlert"] ?></strong>
        <?= $_GET["contentAlert"] ?>
    </div>
    <?php
}
?>