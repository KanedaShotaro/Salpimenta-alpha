<?php
echo "helpers.php/";

function alerts($typeAlert,$titleAlert,$contentAlert){
    $_GET["typeAlert"] = $typeAlert;
    $_GET["titleAlert"] = $titleAlert;
    $_GET["contentAlert"] = $contentAlert;
}