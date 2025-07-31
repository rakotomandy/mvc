<?php


function autoload($className) {
    if(file_exists("Core/" . $className . ".php")) {
        require_once "Core/" . $className . ".php";
    }elseif(file_exists("Controllers/" . $className . ".php")) {
        require_once "Controllers/" . $className . ".php";
    }elseif(file_exists("Models/" . $className . ".php")) {
        require_once "Models/" . $className . ".php";
    }elseif(file_exists("Views/" . $className . ".php")) {
        require_once "Views/" . $className . ".php";
    }
}

spl_autoload_register("autoload");
?>