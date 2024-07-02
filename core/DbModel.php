<?php

namespace app\core;

abstract class DbModel extends Model
{

    abstract function TableName():string;
    abstract function Attribute():array;

    public function Save():bool
    {
        $table  = $this->TableName();
        $attribute = $this->Attribute()??[];
        $params = array_map(fn($res) => ":$res",$attribute);

         $resulet = self::prepare("INSERT INTO $table (".implode(',',$attribute).")
          VALUES (".implode(',',$params).")");

         foreach ($attribute as $att){
             $resulet->bindValue(":$att",$this->{$att});
         }

         $resulet->execute();
         return true;
    }


    public static function prepare($sql)
    {
       return Application::$app->dp->pdo->prepare($sql);
    }
}