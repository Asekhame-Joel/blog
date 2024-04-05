<?php 

namespace Core;
class Container{
    protected $bindings = [];
    //this bindings property holds the value of the key
    //and stores it in the name property 
    public function addContainer($key, $value){
        $this->bindings[$key] = $value;
//what happens here is that the key is assigned a value
//and the value is registered or added to the key and stored in the bindin property

    }

    public function removeContainer($key){
        if(!array_key_exists($key, $this->bindings)){
        throw new \Exception('No matching Binding found for ' . $key);
        }
        $value = $this->bindings[$key];
        return call_user_func($value);

//what is happening here is that if the key which has a value already or supposed to have a value
// is found without a value in the array, throw in an exception error
//but if its with a value   assign the value to the key, in the
//binding array;
//then call the function of the value which returns an instance or a function   thats a value 
    }
}