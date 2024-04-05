<?php
use Core\Authenticator;
use Http\Forms\LoginForm;


$form = LoginForm::validate($attributes =[
    //here an object is initialized and a validate method is called statically on the object
    //the validate method perform a validation check on the attributes which is an array of
    // inputs(username & password) from the user
    'username' => $_POST['username'],
    'password' => $_POST['password']
    ]);

   
   $signedIn = (new Authenticator)->attempt($attributes['username'], $attributes['password']);
   //here the the authenticator class is instantiated and an attempt method which authenticates a user by checking the database
//to see if the user exists or not, also checks if the password is correct or not.
//if all is true...it then logs in the user.
   if (!$signedIn){
        $form->AddErrors('username', 'No matching account found email and password')->throw();
        //here if the authentication return false...meaning the username or password was not correct
        //an error thrown
        
    } 
    //else if every is true..the user is login and taken to the homepage.
    redirect('/');


