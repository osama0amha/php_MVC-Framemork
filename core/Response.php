<?php

namespace app\core;

class Response
{
     public function status($code):void
     {
         http_response_code($code);
     }
}