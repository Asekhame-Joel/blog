<?php 

namespace Core;
class Session{

    public static function checkSession($key){
        //this would return true or false, it depends wether the getsession has a value or not
        //if the getsession method is provided with a value, it returns true.
         return (bool) static::getSession($key);
   }

    public static function addSession($key, $value){
// this function is responsible for adding new session variable to the session array
//Inside the function, it sets the session variable identified by $key to the value specified by $value.
//If you call addSession('username', 'John'), it will create a session variable named 'username' with the value 'John'.
// Later in your code or on subsequent page loads, 
// you can retrieve this value using $_SESSION['username'], and it will return 'John'.

          $_SESSION[$key] = $value;

    }
    
    public static function getSession($key, $default = null){
//Inside this method, it first checks if the session variable is part of a "flashed" session (temporary session variables).
//It checks if the session variable exists in the $_SESSION['__flashed'] array using the provided $key.
//If the session variable exists in the flashed session ($_SESSION['__flashed'][$key]), it returns its value.
       
if(isset($_SESSION['__flashed'][$key])){
        return $_SESSION['__flashed'][$key];
       }
        return $_SESSION[$key] ?? $default;

        
  }

  public static function flash($key, $value){
     $_SESSION['__flashed'][$key] = $value; 
     
}
public static function unflash(){
    unset($_SESSION['__flashed']);

}
public static function flush(){
$_SESSION = [];
}

public static function destroy(){
    static::flush();
    session_destroy();
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

    header('location: /');
    exit();

}


}