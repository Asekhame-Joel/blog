<?php
use Core\Database;
use Core\Validator;
use Core\App;

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

//validate form
$error = [];
if (!Validator::email($email)) {
    $error['email'] = "Please input a valid email address";
}

if (!Validator::string($username, 7, 50)) {
    $error['username'] = "Username must be a min of 7 and max of 50";
}
if (!Validator::string($password, 5, 50)) {
    $error['password'] = "Password must be a min of 5 and max of 50";
}

//if no errors, check if user exists
if (empty($error)) {
    $db = App::remove('Core/Database');
    $user = $db->query('select * from users where email = :email', [
        ':email' => $email
    ])->find();


    if ($user) {
        //if user exist, throw an error
        $error['email'] = "User already exist, please procced to the login page";
        // header('location: /');
        // exit();

    } else {
        //if user does not exist create a new user
        $db->query("INSERT INTO users(username, email, password) VALUES(:username, :email, :password)", [
            ':username' => $username,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_BCRYPT)
        ]);


        //in this session what is happening her is that user is assign any value from the email variable
        // so if an email is asekhame@gmail.com, asekhamejoel@gmail.com will be the same as 'user'
        $_SESSION['user'] = [
            'email' => $email
        ];
        //after a successfully user creation...the user is login and directed to the home page

        header('location: /');
        exit();
    }
}


view("registration/create.view.php", [
    'error' => $error
]);