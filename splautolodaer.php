<?php
spl_autoload_register(function($class) 
{
    $root = $_SERVER['DOCUMENT_ROOT'];
    $ds = DIRECTORY_SEPARATOR;
    $filename = $root . $ds . str_replace('\\', $ds, $class) . '.php';
    if (!file_exists($filename)) {
        $separClass = explode('\\', $class);
        $className = array_pop($separClass);
        $namespace = implode($ds, $separClass);
        while (!file_exists($filename)) {
            $root = dirname($root);
            $filename = $root . $ds . $namespace . $ds . $className . 
            '.php';
        }
        require ($filename);
    } else {
        require ($filename);
    }
});
?>