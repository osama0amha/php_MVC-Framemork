<?php

namespace app\Model;

use Os\MvcFramework\Application;
use Os\MvcFramework\Model;

class LoginModel extends Model
{
    public string $email = '';
    public string $password = '';


    public function rul():array
    {
        return [
              'email'=>[self::RULE_REQUIRED,self::RULE_EMAIL],
               'password'=>[self::RULE_REQUIRED]
        ];
    }


    public function login()
    {
        $user = User::findOn(['email'=> $this->email]);
        if(!$user){
            $this->AddError('email','This email Not Found');
            return false;
        }
        if(!password_verify($this->password,$user->password)){
            $this->AddError('password', 'password not work');
            return false;

        }

        Application::$app->login($user);
        return true;

    }

}