<?php
namespace Http\Forms;
use Core\ValidationException;
use Core\Validator;

class LoginForm{
protected $error = [];


public function __construct(public array $attributes){
//this constructor is called immediately the loginform class is instantiated.

    //an array of attributes is passed here

    if (!Validator::string($attributes['username'])) {
        $this->error['username'] = "Please provide a valid username";
        //it checks the  attributes array and look for the username and try to validate it, if the validation fails;
        // it adds the error to error arrays of the username and out the assign message.
    }
    if (!Validator::string($attributes['password'])) {
        $this->error['password'] = "Please provide a valid password";
        //same here just like the username.
    }
    
    
}
    public static function validate($attributes){
        //this method is used to validate the input of the forms which is the attributes, which consist the username and password

   $instance = new static($attributes);
   //and instance of the current class is called which is the loginform class, which validates automatically because of the 
   //constructor
   //this loginform class validates the the form attributes once it is called
   //meaninng 
   return $instance->failedError() ? $instance->throw() : $instance;
   //so here it checks if the there is a validation error on the class
   //if there is it throws and exception error on the class
   //else it returns the instance of the class or loginform object
  
    }
public function failedError(){
    return count($this->error);
    //this method checks if there are any error count, that is if there was an error stored in the $error array
    //if there was its return  it
    //so it counts the error on the error array and returns true or false....
}

public function throw(){
    ValidationException::withErrorsAndOldData($this->error(), $this->attributes);
    //this method throws a validationException error when there is an error 
    //it checks the error, if there was an error, it gets the error and gets the old data also.


}

public function error(){
    return $this->error;
    //returns any error in the error array
    //its like a getter, since the error array cant be access from anywhere outside this class
    //it is used to get access to the error array. 
}

 public function AddErrors($field, $message){
    $this->error[$field] = $message;
return $this;
 }
 //this method is used to add errors to the error array
 //it is used to dynamically add errors to the error array
 //it returns the current instance, so method calls can be chain together 

}
