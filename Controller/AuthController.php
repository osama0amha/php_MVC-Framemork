<?php

namespace app\Controller;

use app\core\Controller;
use app\core\Request;
use app\Model\User;

class AuthController extends Controller
{
    public function login()
    {
        return $this->render('login');
    }
    public  function  register(Request $request)
    {
        $user = new User();
        if($request->isPost()){

            $user->lodData($request->getBody());

            if($user->validate()&& $user->Save()){
                echo 'secss';
            }

            return $this->render('register',['Model'=> $user]);
        }
        return $this->render('register',['Model'=> $user]);


    }

}