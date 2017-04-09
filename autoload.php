<?php

// Autoload function for the other classes to use it
function __autoload($class)
{
    $str = strpos($class, "\\");
    $class = substr($class, $str + 1);
    $class = str_replace("\\", "/", $class) . ".php";
    include $class;
}