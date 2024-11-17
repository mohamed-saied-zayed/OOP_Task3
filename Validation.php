<?php

class Validation{

    private $errors =[];
    private function addError($inputName,$message){
        $error = [$inputName=>$message];
        array_push($this->errors,$error);
    }
    public function required($input,$inputName){
        if(empty($input)){
           $this->addError($inputName,'the input is required');
        }
    }
    public function max($input ,$inputName,$maxvlaue){
        if(strlen($input)>$maxvlaue){
            $this->addError($inputName,'the input must be less than '.$maxvlaue);
        }
    }
    public function min($input,$inputName,$minValue){
        if(strlen($input)<$minValue){
            $this->addError($inputName,'the input must be greater than '.$minValue);
        }
    }
    public function emailRole1($input,$inputName){
        if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
            $this->addError($inputName,'you must enter a valid email');
        }
    }
    public function emailRole2($input,$inputName){
        if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$input)){
            $this->addError($inputName,'you must enter a valid email');
        }
    }
    public function numeric($input,$inputName){
        if(!is_numeric($input)){
            $this->addError($inputName ,'you must enter a numeric value');
        }
    }
    public function alphaNumeric($input,$inputName){
        if(!preg_match("/^[a-zA-Z0-9]+$/",$input)){
            $this->addError($inputName,'you must enter numbers and characters');
        }
    }
    public function matchedInput($input,$inputName,$matchedInput){
        if($input != $matchedInput){
            $this->addError($inputName,'you must enter the same value');
        }
    }
    public function matchPattern($input,$inputName,$pattern){
        if(!preg_match($pattern,$input)){
            $this->addError($inputName,'you must match the pattern');
        }
    }

    public function phone($input,$inputName){
        if(!preg_match("/^[0-9]{10}$/",$input)){
            $this->addError($inputName,'you must enter a valid phone number');
        }
    }
    public function url($input,$inputName){
        if(!filter_var($input,FILTER_VALIDATE_URL)){
            $this->addError($inputName,'you must enter a valid URL');
        }
    }
    public function getErrors(){
        return $this->errors;
    }
}