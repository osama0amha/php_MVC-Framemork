<?php

namespace app\Model;

use Os\MvcFramework\DbModel;
use Os\MvcFramework\Model;

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
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);
        return ['name','email','password'];
    }

    public static function Unique():string
    {
        return 'id';
    }
}