<?php 

// return [
//     '/' => 'controllers/index.php',
//     '/about' => 'controllers/about.php',
//     '/contact' => 'controllers/contact.php',
//     '/posts' => 'controllers/posts/index.php',
//     '/post' => 'controllers//posts/show.php',
//     '/posts/create' => 'controllers/posts/create.php'


// ];
  
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');


$router->get('/post', 'posts/show.php');
$router->delete('/post', 'posts/destroy.php')->only('auth');
$router->get('/posts', 'posts/index.php');

$router->post('/posts', 'posts/store.php');
$router->get('/posts/create', 'posts/create.php')->only('auth');

$router->get('/posts/edit', 'posts/edit.php')->only('auth');
$router->update('/post', 'posts/update.php')->only('auth');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');


$router->get('/login', 'login/create.php');
$router->post('/login', 'login/store.php');

$router->delete('/logout', 'login/destroy.php');
$router->post('/logout', 'login/destroy.php');










