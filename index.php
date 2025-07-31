<?php 

require_once "Core/Autoload.php";

if(isset($_GET["action"])) {
    Root::connect($_GET["action"]);
}else {
    echo "ERROR 404 NOT FOUND";
    exit;
}