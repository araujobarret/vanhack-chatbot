<?php

// Autoload function for the other classes to use it
function __autoload($classe)
{
    $str = strpos($classe, "\\");
    $classe = substr($classe, $str + 1);
    $classe = str_replace("\\", "/", $classe) . ".php";
    include $classe;
}