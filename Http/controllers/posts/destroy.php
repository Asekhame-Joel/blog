<?php 
Use Core\Database;
use Core\App;

// $config = require base_path("config.php");
// $db = new Database($config['database']);

$db = App::remove('Core/Database');
$currentUserId = 34;

if(isset($_POST['submit'])){
    $post = $db->query('select * from posts where id = :id',
     ['id' => $_GET['id']]
    )->findorAbort();

    
authorize($post['user_id'] === $currentUserId);

$post = $db->query('delete from posts where id = :id',[
    'id' => $_GET['id']
]);

header('location: /posts');
exit();
}
