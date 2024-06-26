<?php

namespace app\Model;

use app\core\Model;

class RegisterModel extends Model
{
    public string $name = "";
    public string $email = "";
    public string $password = "";
    public string $confirmPassword = "";


    public function rul(): array
    {
        return [
            $this->name => [self::RULE_REQUIRED],
            $this->email => [self::RULE_REQUIRED,self::RULE_EMAIL],
            $this->password => [self::RULE_REQUIRED,[self::RULE_MIN , 'min'=>8],[self::RULE_MAX,'max'=>250]],
            $this->confirmPassword => [self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'password']],
        ];
    }
}