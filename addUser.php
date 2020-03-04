<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require_once 'essential.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['email']) and isset($_POST['password'])) {
            $stmt = $conn->prepare("INSERT INTO users (`firstname`, `lastname`, `password`, `email`) VALUES (:fname, :lname, :pword, :email)");

            $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
            $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

            if (validatePassword($password)) {

                $hash = password_hash($password, PASSWORD_DEFAULT);

                $stmt->bindParam(':fname', $firstname, PDO::PARAM_STR);
                $stmt->bindParam(':lname', $lastname, PDO::PARAM_STR);
                $stmt->bindParam(':pword', $hash, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);

                $stmt->execute();
                echo "User successfully added.\naddUser.php";
            } else {
                echo "Invalid Password", $password;
            }
        } else {
            echo "POST superglobal is empty";
        }
    } else {
        echo "Incorrect request method, method is not POST";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
