<?php
use Core\Session;
use Core\ValidationException;

session_start();

CONST BASE_PATH = __DIR__ .'/../';
require  BASE_PATH . 'vendor/autoload.php';



require BASE_PATH . 'Core/functions.php';


// spl_autoload_register(function ($class){

//     $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
//     require base_path("{$class}.php");
// });


require base_path('views/bootstrap.php');

$router = new Core\Router();
$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// $method = isset($_POST['_method']) ? $_POST['_method']: $_SERVER['REQUEST_METHOD'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']; 

try{
$router->route($uri, $method);
//it tries to match the requested uri with a method in the routes object
//if its finds it.....it provides the user the requested routes
}
//if an error occurs it  catches it and throw a validation error
//
catch(ValidationException $exception){
    // Flashing data means storing it in the session
    //  so it can be accessed on the next page load, but it gets removed automatically after that.
    Session::flash('error', $exception->error);
//it takes the old data and the error thrown and stores it in the session
Session::flash('old', $exception->old);
// After storing the error messages and old data in the session,
//  it redirects the user back to the previous page they were on.
// This is typically done to show the user the form again with the validation errors displayed.
 return redirect($router->previousUrl());

}
Session::unflash();
//the session is clear out, this is to ensure the previous data is remove and a new one is shown if an error is thrown
