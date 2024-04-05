<?php
namespace Core;
//this app class serve as a way to interact with the container class
class App{
    protected static $container;
public static function setContainer($container){

    static::$container = $container;
}
//what this does is it sets the container to a container thats a parameter in the setContainer method 
//which accepts a container and set it to a container variable so it can be used
// The setContainer method is a static method that allows setting the container instance for the App class.
//  It takes a single parameter $container, representing the container instance, and sets it to the $container property.

public static function callContainer(){

   return  static::$container;   
}
// The callContainer method is a static method that returns the container instance. 
// It simply accesses the $container property and returns its value.
//it return the value of what ever has been set in the container variable

public static function add($key, $value){
    return static::callContainer()->addContainer($key, $value);
}
// The add method is a static method that serves as a shortcut for adding a new binding to the container. 
// It takes two parameters: $key, representing the key of the binding, and $value, representing the value associated with the key. 
// It internally calls the addContainer method of the container instance and passes the key-value pair to it.
//furthermore it returns whatever is the value associated to the key

public static function remove($key){
    return static::callContainer()->removeContainer($key);
}
// The remove method is a static method that serves as a shortcut for removing a binding from the container. 
// It takes a single parameter $key, representing the key of the binding to be removed.
//  It internally calls the removeContainer method of the container instance and passes the key to it.

}