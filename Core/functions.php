<?php 

function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function Url($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition){
    if(!$condition){
abort(Core\Response::FORBIDDEN);
}
}
function base_path($path){
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
 extract($attributes);
  require base_path('views/' . $path);
}

function abort($code = 404){
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
    }
    
   function redirect($path){
    header("location: {$path}");
    exit();
   }

   function old($key, $default = ''){
    return Core\Session::getSession('old')[$key] ?? $default;
    
   }