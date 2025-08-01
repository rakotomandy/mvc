<?php

class Load{

    public static function view($viewName, $data = [])
    {
       if(!empty($data)){
        foreach($data as $key => $value){
            $$key = $value; // Extract variables from the data array
        }
       }
       require_once "$viewName.php";
    }

    public static function template($templateName, $data = [])
    {
        if(!empty($data)){
            foreach($data as $key => $value){
                $$key = $value; // Extract variables from the data array
            }
        }
        require_once "View/".$templateName . ".php";
    }

    public static function js($jsName)
    {
       if(is_array($jsName)){
            foreach($jsName as $js){
                echo "<script src='".URL."Public/js/$js.js'></script>";
            }
        }
    }

    public static function css($cssName)
    {
        if(is_array($cssName)){
            foreach($cssName as $css){
                echo "<link rel='stylesheet' href='".URL."Public/css/$css.css'>";
            }
        }
    }
}