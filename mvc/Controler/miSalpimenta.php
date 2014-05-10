<?php

echo "miSalpimenta/";

ob_start();
require '/var/www/Salpimenta-backend/mvc/View/miSalpimentaView.php';
$tpl_content = ob_get_clean();
require '/var/www/Salpimenta-backend/mvc/View/layoutView.php';