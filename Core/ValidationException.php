<?php 
namespace Core;


class ValidationException extends \Exception{
    public readonly array $error;
    public readonly array $old;
    //this properties are set to readonly so they cant change no matter what outside the class.


     
public static function withErrorsAndOldData($error, $old){
    //this is an instance of the current class
$instance = new static;

$instance->error = $error;
//access the error property of the current class
$instance->old = $old;

throw $instance;
//throws an exception class with the current instance
}

}