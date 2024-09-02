<?php

namespace app\Controller;

use Os\MvcFramework\Application;
use Os\MvcFramework\Controller;

class ContentController extends Controller
{
  public function content(): string
  {
      $arr = [
          'oussama'=> 'amha',
      ];
   return $this->render('content',$arr);

  }
}