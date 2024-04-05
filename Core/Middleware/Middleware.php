<?php
namespace Core\Middleware;

class Middleware{
 
    public const MAP = [

        'guest' => Guest::class,
        'auth' =>  Auth::class
    ];

public static function resolve($key){

    if(!$key){
        return; 
        //if  no key is found, the method stops execution and does nothing further. 
    }

   $middleware = static::MAP[$key] ?? false;
   //here the  key provided will check the corresponding class name associated with it, 
   //if a class name is found associated with the key...it stores it in the $middleware variable

   if(! $middleware){
    throw new \Exception("No matching middleware found '{$key}'. ");
   }
  (new $middleware)::handle();
  //if a matching middleware is found through the key, an instance of that class is created and a static handle method is called
  
         
        
        }
        
    }

