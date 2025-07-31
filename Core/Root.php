<?php

class Root
{
    public static function connect($url)
    {
        // Assuming this method handles the connection logic based on the action
        $urlVar = htmlspecialchars($url);
        $urlVar = trim($urlVar, "/");
        $urlVar = explode("/", $urlVar);
        $className = ucfirst(($urlVar[0] ?? ''));
        if (is_numeric(strpos($url, "/"))) {
            if (count($urlVar) == 2) {
                $methodName = $urlVar[1] ?? '';
                if (method_exists($className, $methodName)) {
                    $reflect = new ReflectionMethod($className, $methodName);
                    $reflect->invoke(new $className());
                }else {
                    echo "there is no method called " . $methodName . " in class " . $className;
                    exit;
                }
            }
        } else {
            if (file_exists("Controllers/" . $className . ".php")) {
                $reflect = new ReflectionMethod($className, "index");
                $reflect->invoke(new $className());
            } else {
                echo "ERROR 404 NOT FOUND";
                exit;
            }
        }
    }
}
