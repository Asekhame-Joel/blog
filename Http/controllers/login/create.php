<?php 

 view("/login/create.view.php", [
    //here the error value stored in the __flashed session is being retrieved 
    'error' => $_SESSION['__flashed']['error'] ?? [],
    'heading' => "Login Page" 
]);