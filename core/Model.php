<?php

namespace app\core;

abstract class Model
{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL= 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public array $errors = [];

   public function lodData($arrPost=[]):void
   {

       foreach ($arrPost as $key => $value){
           if(property_exists($this,$key)){
               $this->{$key} = $value;
           }
       }
   }
   abstract public function rul():array;

   public function validate(){

       foreach ($this->rul() as $key => $value){
         $firstname = $key;

         foreach($value as $rul){
            $rulName = $rul;
             if(!is_string($rul)){
                 $rulName= $rul[0];

             }

             if($rulName == self::RULE_REQUIRED && strlen($this->{$firstname})== 0 ){
                 $this->AddError($firstname,$rulName,$rul);
             }
             if($rulName == self::RULE_MAX && strlen($this->{$firstname})>$rul['max']){
                 $this->AddError($firstname,$rulName,$rul);
             }
             if($rulName == self::RULE_MIN && strlen($this->{$firstname})<$rul['min']){
                 $this->AddError($firstname,$rulName,$rul);
             }
             if($rulName == self::RULE_MATCH && $this->{$firstname} != $this->{$rul['match']}){
                 $this->AddError($firstname,$rulName,$rul);
             }
             if($rulName == self::RULE_EMAIL && !filter_var($this->{$firstname},FILTER_VALIDATE_EMAIL)){
                 $this->AddError($firstname,$rulName,$rul);
             }
         }
       }

   }

   public function AddError($attribute,$rulName,$rul):void
   {
       $message= $this->ErrorMessage()[$rulName];
       if(!is_string($rul)){
           $message = str_replace("{{$rul[0]}}",$rul[$rulName],$message);
       }
       $this->errors[$attribute][]=$message;
   }

   public function ErrorMessage():array
   {
       return[
           self::RULE_REQUIRED => 'This field is required',
           self::RULE_EMAIL => 'This field must be valid email address',
           self::RULE_MIN => 'Min length of this field must be {min}',
           self::RULE_MAX => 'Min length of this field must be {min}',
           self::RULE_MATCH => 'This field must be the same as {match}'
       ];

   }
}