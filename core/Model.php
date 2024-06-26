<?php

namespace app\core;

abstract class Model
{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL= 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

   public function lodData($arrPost=[])
   {

       foreach ($arrPost as $key => $value){
           if(property_exists($this,$key)){
               $this->{$key} = $value;
           }
       }
   }
   abstract public function rul():array;

   public function validate(){

       foreach ($this->rul() as $key => $rul){

       }
   }
}