<?php 
use Core\Database;
use Core\Validator;
use Core\App;

// $config = require base_path("config.php");
// $db = new Database($config['database']);
$db = App::remove('Core/Database');

$currentUserId = 34;
$error = [];

if(isset($_POST['submit'])){

!Validator::string($_POST['title']) ? $error['title'] = "A Title of less than One character and not more than 100 character is required" : '';
!Validator::string($_POST['body']) ? $error['body'] = "A Body of less than one character and not more than 100 character is required" : '';


//  strlen($_POST['title']) === 0 ? $error['title'] = "Title is required" : '';
//  strlen($_POST['body']) === 0 ? $error['body'] = "Body is required" : '';

//  strlen($_POST['title']) > 1000 ? $error['title'] = "less than 1000 character is required for title" : '';
//  strlen($_POST['body']) > 1000 ? $error['body'] = "Less than 1000 character is required for body" : '';

if(empty($error)){

$db->query('INSERT INTO posts(title, body, user_id)
VALUES(:title, :body, :user_id)',[
'title' => $_POST['title'],
'body' => $_POST['body'],
'user_id' => $currentUserId
]);
}
}
view("posts/create.view.php", [
    'heading' => "Create Post", 
    'error' => $error
]);