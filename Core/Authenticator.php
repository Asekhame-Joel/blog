<?php
namespace Core;


class Authenticator
{
    public function attempt($username, $password)
    {

//this method attempt to authenticate a user with the provided username and password
        $user = App::remove('Core/Database')->query('select * from users where username = :username', [
            'username' => $username
        ])->find();
        //it tries to fetch the provided username from the database if its the correct one.



        if ($user) {
            //if the user is in the database....check for the the password and see if its the correct one
            if (password_verify($password, $user['password'])) {
                //if the password is correct it calls the login function and login the user
                //the login function sets up a users session, what this means is that its assigns sessions data
                //and assigns and store the username of the logged in user.
            
                $this->login([
                    'username' => $username
                ]);
                //if the password is the correct one its returns true

                return true;
            }
        }
        //if the  is incorrect it returns false
        return false;

    }
    public function login($user)
    {
        $_SESSION['user'] = [
            'username' => $user['username']
        ];
        session_regenerate_id(true);
    }


    public static function logout()
    {

       Session::destroy();
    
    }
}