<?php
include "Models/loginDB.php";


include "PHPMailer\src\PHPMailer.php";
include "PHPMailer\src\Exception.php";
include "PHPMailer\src\OAuthTokenProvider.php";

include "PHPMailer\src\OAuth.php";
include "PHPMailer\src\POP3.php";
include "PHPMailer\src\SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

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
            case 'forgotPassword':
                $this->forgotPassword();
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
                return; // Stop execution if validation fails
            }

            // Check if the username exists in the database
            if (!LoginDB::userExists($username)) {
                $message_error = 'Vui lòng kiểm tra lại user name và password ';
                $this->index($message_error);
                return; // Stop execution if username doesn't exist
            }

            if (LoginDB::usernameExistsAndPasswordIncorrect($username, $password)) {
                $message_error = 'Vui lòng kiểm tra lại user name và password ';
                $this->index($message_error);
                return; // Stop execution if username doesn't exist
            }
            if (!empty($username) || !empty($password)) {
                LoginDB::login($username, $password);
                return; // Stop execution if validation fails

            }

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


    // Function to check if a username already exists in the users table
    public function isValidUsername($username)
    {
        try {
            $db = \Connection::getDB();

            // Prepare the SQL statement with a placeholder for the username
            $stmt = $db->prepare("SELECT username FROM users WHERE username = :username");

            // Bind the value of $username to the :username placeholder
            $stmt->bindParam(':username', $username, \PDO::PARAM_STR);

            // Execute the query
            $stmt->execute();

            // Fetch the result (if any)
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            // Check if a row with the given username exists
            if ($result) {
                return true; // Username exists
            } else {
                return false; // Username doesn't exist
            }
        } catch (\PDOException $e) {
            // Handle any database connection or query errors here
            // You may want to log the error or return a specific error code
            return false;
        }
    }


// Function to check if an email already exists in the users table
    public function isEmailValid($email)
    {
        try {
            $db = \Connection::getDB(); // Your database connection
            $stmt = $db->prepare("SELECT email FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            // Check if the email exists in the database
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return ($result !== false); // Return true if the email exists, false otherwise
        } catch (PDOException $e) {
            // Handle any database errors here
            // You can log or throw an exception as needed
            // For example: throw new Exception("Database error: " . $e->getMessage());
            return false; // Return false to indicate an error occurred
        }
    }

    
    public function register(){
    try {
        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $password = filter_input(INPUT_POST, 'password');
        if (!empty($username) && !empty($password) && !empty($email) && !empty($phone)) {
            LoginDB::register($username, $email, $phone, $password);
            header('location: /upfb/user');
            echo '<div class="alert alert-warning d-flex align-items-center justify-content-between" role="alert">
            <div class="flex-fill mr-3">
                <p class="mb-0">Đăng ký thành công </p>
            </div>
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-exclamation-circle"></i>
            </div>
        </div>';
        } else {
            echo '<div class="alert alert-warning d-flex align-items-center justify-content-between" role="alert">
                <div class="flex-fill mr-3">
                    <p class="mb-0">Vui lòng điền đầy đủ.</p>
                </div>
                <div class="flex-00-auto">
                    <i class="fa fa-fw fa-exclamation-circle"></i>
                </div>
            </div>';
        }
    } catch (Exception $e) {
        $message_error = 'Đã xảy ra lỗi: ' . $e->getMessage();
        $this->index($message_error);
    }
}


    public function forgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the form data
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';

            // Validate input and generate a new password if both username and email are valid
            if ($username && $email) {
                if ($this->isValidUsername($username) && $this->isEmailValid($email)) {
                    // Generate a new password (you can customize this part)
                    $newPassword = $this->generateRandomPassword();
                    // Update the user's password in the database
                    $this->updatePassword($username, $newPassword);

                    // Send the email with the new password
                    $subject = "Password Reset";
                    $emailContent = "Your new password is: " . $newPassword;
                    $result = $this->sendEmail($email, $subject, $emailContent);

                    if ($result === true) {
                        echo '<div class="alert alert-warning d-flex align-items-center justify-content-between" role="alert">
                    <div class="flex-fill mr-3"><p class="mb-0">Mật khẩu mới đã gửi tới mail</p></div>
                    <div class="flex-00-auto"><i class="fa fa-fw fa-exclamation-circle"></i></div>
                </div>';
                    } else {
                        echo '<div class="alert alert-danger d-flex align-items-center justify-content-between" role="alert">
                    <div class="flex-fill mr-3"><p class="mb-0">Email could not be sent. Error: ' . $result . '</p></div>
                    <div class="flex-00-auto"><i class="fa fa-fw fa-exclamation-circle"></i></div>
                </div>';
                    }
                } else {
                    echo '<div class="alert alert-warning d-flex align-items-center justify-content-between" role="alert">
                <div class="flex-fill mr-3"><p class="mb-0">Invalid username or email.</p></div>
                <div class="flex-00-auto"><i class="fa fa-fw fa-exclamation-circle"></i></div>
            </div>';
                }
            } else {
                echo '<div class="alert alert-warning d-flex align-items-center justify-content-between" role="alert">
            <div class="flex-fill mr-3"><p class="mb-0">Vui lòng nhập đủ tất cả các trường.</p></div>
            <div class="flex-00-auto"><i class="fa fa-fw fa-exclamation-circle"></i></div>
        </div>';
            }
        } else {
            echo '<div class="alert alert-warning d-flex align-items-center justify-content-between" role="alert">
        <div class="flex-fill mr-3"><p class="mb-0">Please use a POST request to reset your password.</p></div>
        <div class="flex-00-auto"><i class="fa fa-fw fa-exclamation-circle"></i></div>
    </div>';
        }
    }

    

    // Function to update the user's password in the database
    private function updatePassword($username, $newPassword)
    {
        try {
            $db = \Connection::getDB(); // Your database connection
            // Hash the new password for security
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

            // Prepare and execute the SQL update query with named placeholders
            $stmt = $db->prepare("UPDATE users SET password = :password WHERE username = :username");
            $stmt->bindParam(':password', $hashedPassword, \PDO::PARAM_STR);
            $stmt->bindParam(':username', $username, \PDO::PARAM_STR);
            $stmt->execute();

            // Check if the update was successful
            if ($stmt->rowCount() > 0) {
                return true; // Password updated successfully
            } else {
                return false; // Password update failed
            }
        } catch (\PDOException $e) {
            // Handle any database errors here
            return false; // Password update failed due to an error
        }
    }


    // Function to generate a random password
    private function generateRandomPassword($length = 10)
    {
        // Define characters allowed in the password
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';
        // Generate a random password by selecting characters from the pool
        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, strlen($characters) - 1);
            $password .= $characters[$index];
        }

        return $password;
    }


    // Function to send an email
    private function sendEmail($recipientEmail, $subject, $emailContent)
    {
        $phpmailer = new PHPMailer(true);

        try {

            // Server settings
            $phpmailer->isSMTP();
            $phpmailer->Host = 'smtp.gmail.com';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Username = 'toilatoi8624@gmail.com';
            $phpmailer->Password = 'wdngvoohyickbxjb';
            $phpmailer->SMTSecure = 'tls';
            $phpmailer->Port = 587;

            // Sender and recipient settings
            $phpmailer->setFrom('toialtoi1996vn@gmail.com', 'NVThanh');
            $phpmailer->addAddress($recipientEmail); // Recipient's email address
            /*$phpmailer->addReplyTo('toilatoi8624@gmail.com', 'user');*/

            // Email content
            $phpmailer->isHTML(true);
            $phpmailer->Subject = $subject;
            $phpmailer->Body = $emailContent;

            // Send the email
            $phpmailer->send();
            return true; // Email sent successfully
        } catch (Exception $e) {
            return 'Email could not be sent. Error: ' . $phpmailer->ErrorInfo;
        }
    }
}