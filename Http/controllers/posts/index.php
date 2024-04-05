<?php
Use Core\Database;
use Core\App;

// $config = require base_path("config.php");
// $db = new Database($config['database']);

$db = App::remove('Core/Database');



$posts = $db->query('select * from posts where user_id = 34')->get();


view("posts/index.view.php", [
    'heading' => "My Blog Posts",
    'posts' => $posts
]);