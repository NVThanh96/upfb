<?php
include "Models/loginDB.php";

class Login
{

    public function __construct()
    {
        $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? 'index';
        switch ($action) {
            case 'index':
                $this->index();
                break;
            case 'btnLogin':
                $this->login();
                break;
            case 'btnLogout':
                $this->btnLogout();
                break;
            case 'btnRegistor':
                $this->register();
                break;
            default:
                break;
        }
    }

    public function index($message_error = null)
    {
        /*header('location: /upfb/');*/
        require_once 'Views/home.php';
    }

    public function login()
    {
        try {
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');



            if (empty($username) || empty($password)) {
                $message_error = 'Vui lòng nhập đủ tất cả các trường.';
                $this->index($message_error);
                return ; // Stop execution if validation fails
            }

            // Check if the username exists in the database
            if (!LoginDB::userExists($username)) {
                $message_error = 'vui lòng kiểm tra lại user name và password ';
                $this->index($message_error);
                return ; // Stop execution if username doesn't exist
            }

            // Server-side validation
            if (!empty($username) || !empty($password)) {
                LoginDB::login($username,$password);
                return ; // Stop execution if validation fails

            }

           /* // Check if the username exists in the database
            if (LoginDB::usernameExistsAndPasswordIncorrect($username,$password)) {
                $message_error = 'vui lòng kiểm tra lại user name và password ';
                $this->index($message_error);
                return ; // Stop execution if username doesn't exist
            }*/

            // Continue with password verification and login
            // ...
        } catch (Exception $e) {
            $message_error = 'Vui lòng nhập đủ tất cả các trường.';
            $this->index($message_error);
        }
    }


    public function btnLogout()
    {
        // Start the session if it's not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Unset session variables
        unset($_SESSION['username']);

        // Destroy the session
        session_destroy();

        // Redirect to the home page or wherever you want after logout
        header("Location: /upfb/"); // You can change the URL as needed
        exit(); // Make sure to exit to prevent further execution
    }

    public function register()
    {
        try {
            $username = filter_input(INPUT_POST, 'username');
            $email = filter_input(INPUT_POST, 'email');
            $phone = filter_input(INPUT_POST, 'phone');
            $password = filter_input(INPUT_POST, 'password');
            if (!empty($username) && !empty($password)) {
                LoginDB::register($username, $email, $phone, $password);
            }
        } catch (Exception $e) {
            $message_error = 'Vui lòng nhập đủ tất cả các trường.';
            $this->index($message_error);
        }
    }
}