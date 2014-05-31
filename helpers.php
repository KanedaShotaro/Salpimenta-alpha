<?php

function alerts($typeAlert,$titleAlert,$contentAlert){
    $_GET["typeAlert"] = $typeAlert;
    $_GET["titleAlert"] = $titleAlert;
    $_GET["contentAlert"] = $contentAlert;
}

function varDum($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}