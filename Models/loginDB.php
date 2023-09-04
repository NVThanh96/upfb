<?php
include "Connection/Connection.php";

class LoginDB
{
    // kiểm tra người dùng đã đăng nhập vào hay chưa
    function checkSession()
    {
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            return false;
        }
    }
    public static function userExists($username)
    {
        try {
            $db = \Connection::getDB();

            $query = "SELECT COUNT(*) FROM users WHERE username = :username";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $count = $stmt->fetchColumn();

            return ($count > 0); // Return true if user exists, false otherwise
        } catch (\PDOException $e) {
            // Handle database connection or query errors here
            // You can log the error or return an appropriate response
            return false;
        }
    }

   /* public static function usernameExistsAndPasswordIncorrect($username, $password)
    {
        try {
            $db = \Connection::getDB();

            // Prepare the query to select user by username
            $query = "SELECT * FROM users WHERE username = :username";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            // Fetch the user data
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (isset($user)) {
                // User found, now verify the password
                $hashedPassword = $user['password']; // Replace 'password' with your actual column name

                if (!password_verify($password, $hashedPassword)) {
                    // Password is incorrect, return true to indicate that the username exists
                    // but the password is wrong
                    return true;
                }
            }

            // Username does not exist or password is correct
            return false;
        } catch (\PDOException $e) {
            // Handle database connection or query errors here
            // You can log the error or return an appropriate response
            return false;
        }
    }*/



    // sau khi lấy được token
    // bỏ vào trong để đăng nhập
    public static function login($username, $password)
    {
        try {
            $db = \Connection::getDB();

            // Prepare the query to select user by username
            $query = "SELECT * FROM users WHERE username = :username";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            // Fetch the user data
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (isset($user)) {
                // User found, now verify the password
                $hashedPassword = $user['password']; // Replace 'password' with your actual column name

                if (password_verify($password, $hashedPassword)) {
                    // Password is correct, set session and redirect
                    $_SESSION['username'] = $username;
                    header('Location: /upfb/user');
                } else {
                    // Password is incorrect, set an error message
                    $message_error = "Please check your username and password again.";
                    /*include 'Views/home.php';*/
                    header('Location: /upfb/');
                    return $message_error;
                }
            } else {
                // User not found, set an error message
                $message_error = "Please check your username and password again.";
                header('Location: /upfb/');
                return $message_error;

            }
        } catch (\PDOException $e) {
            // Handle database connection or query errors here
            // You can log the error or return an appropriate response
            return false;
        }
    }


    public static function register($username, $email, $phone, $password)
    {
        try {
            $db = \Connection::getDB();

            // Hash the password before inserting it into the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Use prepared statements to prevent SQL injection
            $stmt = $db->prepare("INSERT INTO users (username, email, phone, password, role) VALUES (:username, :email, :phone, :password, 'user')");

            if ($stmt === false) {
                throw new Exception("Error preparing SQL statement.");
            }

            // Bind parameters
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':password', $hashedPassword); // Store the hashed password
            $stmt->execute();
            $_SESSION['username'] = $username;

            // Registration successful
            return "Registration successful. You can now log in.";
        } catch (Exception $e) {
            // Handle errors and return an error message
            return "Error: " . $e->getMessage();
        }
    }




}

