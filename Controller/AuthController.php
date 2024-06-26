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
        $registerModel = new RegisterModel();
        if($request->isPost()){


            $registerModel->lodData($request->getBody());
           $registerModel->validate();


            return $this->render('register',['Model'=> $registerModel]);
        }
        return $this->render('register',['Model'=> $registerModel]);


    }

}