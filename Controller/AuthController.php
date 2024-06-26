<?php

namespace app\Controller;

use app\core\Controller;
use app\core\Request;
use app\Model\RegisterModel;

class AuthController extends Controller
{
    public function login()
    {
        return $this->render('login');
    }
    public  function  register(Request $request)
    {
        if($request->isPost()){

            $registerModel = new RegisterModel();
            $registerModel->lodData($request->getBody());



        }

        return $this->render('register');
    }

}