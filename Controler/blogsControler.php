<?php
Block::test();

$view = new View("blogsView",array("zona" => $_GET["zona"]));
$view->execute();

