<?php

namespace app\core;

class Request
{
    public function getMethod():string
    {
         return strtolower($_SERVER['REQUEST_METHOD']);

    }
    public function getPath():string
    {
        $st1path = $_SERVER['REQUEST_URI'];
        $pathFound = strpos($st1path,'?')??false;
        if(!$pathFound)
        {
            return $st1path;
        }
        return substr($st1path,0,$pathFound );
    }

}