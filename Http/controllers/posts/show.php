<?php 
Use Core\Database;
use Core\App;

// $config = require base_path("config.php");
// $db = new Database($config['database']);

$db = App::remove('Core/Database');
  $post = $db->query('select * from posts where id = :id', ['id' => $_GET['id']]
    )->findorAbort();
    

view("posts/show.view.php", [
    'heading' => "My Blog Post", 
    'post' => $post
]);