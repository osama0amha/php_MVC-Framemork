<?php

namespace app\Controller;

use app\core\Application;
use app\core\Controller;

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