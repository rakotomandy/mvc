<?php
session_start(); // Start the session to manage user sessions

// Define the base URL for the application
define("URL", "http://localhost/mvc/");

function autoload($className) {
    if(file_exists("Core/" . $className . ".php")) {
        require_once "Core/" . $className . ".php";
    }elseif(file_exists("Controllers/" . $className . ".php")) {
        require_once "Controllers/" . $className . ".php";
    }elseif(file_exists("Model/" . $className . ".php")) {
        require_once "Model/" . $className . ".php";
    }elseif(file_exists("View/" . $className . ".php")) {
        require_once "View/" . $className . ".php";
    }
}

spl_autoload_register("autoload");
?>