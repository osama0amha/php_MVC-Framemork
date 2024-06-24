<?php

namespace app\Controller;

use app\core\Controller;

class ContentController extends Controller
{
  public function content(): string
  {
   return $this->render('content');
  }
}