<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

session_start();

if (isset($_SESSION['loggedin'])) {
    header('location: index.php');
    //exit;
}

require_once 'essential.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['username']) and isset($_POST['password'])) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :username");

            $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $admin = $username === 'admin@bugme.com' and $password === $result['password'];

            if(password_verify($password, $result['password']) or $admin) {
                //$token = password_hash(rand(), PASSWORD_DEFAULT);
                session_start();

                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $result['email'];
                $_SESSION['userid'] = $result['id'];
                //$_SESSION['token'] = $token;

                //var_dump($_SESSION['id']);
                echo "login success\nlogin.php";
                header("location: index.php");

            } else {
                echo "Invalid username or password\nlogin.php";
            }
        } else {
            echo "Please fill out all fields";
        }
    } else {
        echo "Incorrect http method";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
