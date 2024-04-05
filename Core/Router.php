<?php
namespace Core;
use Core\Middleware\Guest;
use Core\Middleware\Auth;
use Core\Middleware\Middleware;
class Router
{

    protected $routes = [];
    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            '_method' => $method,
            'middleware' => null
        ];
        return $this;
    }

    public function get($uri, $controller)
    {
       return $this->add('GET', $uri, $controller);

    }

    public function post($uri, $controller)
    {
        return  $this->add('POST', $uri, $controller);

    }

    public function update($uri, $controller)
    {
        return  $this->add('UPDATE', $uri, $controller);

    }

    public function delete($uri, $controller)
    {
        return  $this->add('DELETE', $uri, $controller);

    }


public function only($key){
    //this line of code is adding a new route ($key) to the routes array, 
    //associating it with the middleware of the most recently added route which the middleware
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    return $this;
}



    public function route($uri, $method)
{
    foreach ($this->routes as $route) {
        if ($route['uri'] === $uri && $route['_method'] === strtoupper($method)) {

         Middleware::resolve($route['middleware']);
         //the line above calls the middleware resolve function statically....it then check the middleware
         //corresponding  route  requested.
//so here the key is the middleware, the middleware is a map, 
//the map has a key thats point to the requested class for the middleware..eg ;guest points to the guest class

            // if($route['middleware'] === 'auth'){
            //     (new Auth)->handle();
               
                
            // }

            return require base_path('Http/controllers/' . $route['controller']);
        }
    }
    
    abort();
    
}

public function previousUrl(){
    return $_SERVER['HTTP_REFERER'];
}




     function abort($code = 404)
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }

}












// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// $routes = require base_path("routes.php");

// function routesToController($uri, $routes){
//     if(array_key_exists($uri, $routes)){
//         require base_path ($routes[$uri]);
//     }else{
//         abort(404);

//     }
// }


// function abort($code = 404){
//     http_response_code($code);
//     require base_path("views/{$code}.php");
//     die();
// }


// routesToController($uri, $routes);