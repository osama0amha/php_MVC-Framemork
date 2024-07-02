<?php

namespace app\Model;

use app\core\DbModel;
use app\core\Model;

class User extends DbModel
{
    public string $name = "";
    public string $email = "";
    public string $password = "";
    public string $confirmPassword = "";

//https://www.typingclub.com/sportal/program-3/147.play

   public function TableName():string
   {
       return 'users';
   }
    public function rul(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED,self::RULE_EMAIL,[self::RULE_UNIQUE,'table'=> self::class]],
            'password'=> [self::RULE_REQUIRED,[self::RULE_MIN , 'min'=>8],[self::RULE_MAX,'max'=>250]],
            'confirmPassword'=> [self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'password']],
        ];
    }

    public function Attribute():array
    {
        return ['name','email','password'];
    }
}