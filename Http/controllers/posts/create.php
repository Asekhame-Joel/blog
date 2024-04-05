<?php 
$error =[];
view("posts/create.view.php", [
    'heading' => "Create Post", 
    'error' => $error
]);