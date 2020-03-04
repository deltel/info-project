<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
require_once 'essential.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['title']) and isset($_POST['description']) and isset($_POST['assignedTo']) and isset($_POST['type']) and isset($_POST['priority'])) {
            //$stmt1 = $conn->query("SELECT * FROM users WHERE id = ");
            //COMPLETE THE ABOVE
            $stmt = $conn->prepare("INSERT INTO issues (`title`, `description`, `assigned_to`, `created_by`, `type`, `priority`) VALUES (:title, :descr, :assignedTo, :createdBy, :typ, :priority)");

            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $assignedTo = filter_var($_POST['assignedTo'], FILTER_SANITIZE_STRING);
            $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
            $priority = filter_var($_POST['priority'], FILTER_SANITIZE_STRING);


            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':descr', $description, PDO::PARAM_STR);
            $stmt->bindParam(':assignedTo', $assignedTo, PDO::PARAM_INT);
            $stmt->bindParam(':createdBy', $_SESSION['userid'], PDO::PARAM_INT);
            $stmt->bindParam(':typ', $type, PDO::PARAM_STR);
            $stmt->bindParam(':priority', $priority, PDO::PARAM_STR);

            $stmt->execute();
            echo "Issue successfully created.\ncreateIssue.php";
        } else {
            echo "POST superglobal is empty";
        }
    } else {
        echo "Incorrect request method, method is not POST";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
