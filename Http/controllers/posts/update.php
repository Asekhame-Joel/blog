<?php
use Core\Database;
use Core\Validator;
use Core\App;

// $config = require base_path("config.php");
// $db = new Database($config['database']);

$db = App::remove('Core/Database');

$currentUserId = 34;


$post = $db->query('select * from posts where id = :id',
 ['id' => $_POST['id']]
)->findorAbort();

authorize($post['user_id'] === $currentUserId);
$error = [];

!Validator::string($_POST['title']) ? $error['title'] = "A Title of less than One character and not more than 100 character is required" : '';
!Validator::string($_POST['body']) ? $error['body'] = "A Body of less than one character and not more than 100 character is required" : '';

view("posts/edit.view.php", [
    'heading' => "Edit Post", 
    'error' => $error,
    'post' => $post
]);


if(empty($error)){
$db->query('update posts set title = :title, body = :body where id = :id',[
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'id' => $_POST['id']
]);
header('location: /posts');
die();

}
