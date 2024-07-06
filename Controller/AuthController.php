<?php

namespace app\Controller;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\Model\LoginModel;
use app\Model\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $loginModel = new LoginModel();
        if($request->isPOST()){
            $loginModel->lodData($request->getBody());
            if($loginModel->validate()&& $loginModel->login()){
                $this->redirect('/');
            }
        }
        return $this->render('login',['Model' => $loginModel]);
    }
    public  function  register(Request $request)
    {
        $user = new User();
        if($request->isPost()){

            $user->lodData($request->getBody());

            if($user->validate()&& $user->Save()){
                Application::$app->session->SetSession('secss','register sacsse');
                $this->redirect('/');
            }

            return $this->render('register',['Model'=> $user]);
        }
        return $this->render('register',['Model'=> $user]);
    }

    public function logout()
    {
        Application::$app->logout();
        $this->redirect('/');
    }

}