<?php

namespace app\core;

class Response
{
     public function status($code)
     {
         http_response_code($code);
     }
}