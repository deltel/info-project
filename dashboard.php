<?php

session_start();

require_once 'essential.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    $stmt = $conn->query("SELECT issues.title, issues.description, issues.type, issues.status, issues.created_by, issues.assigned_to, issues.updated, issues.created, users.firstname, users.lastname 
    FROM issues
    JOIN users
    ON issues.assigned_to=users.id");
    $issue = $stmt->fetchAll(PDO::FETCH_ASSOC);

    /*
    foreach ($issue as $row):
        $rowNum = 1;
        $row += ['row' => $rowNum];
        $rowNum++;
*/
    $stmt1 = $conn->query("SELECT issues.id, issues.title, issues.created_by, users.firstname, users.lastname 
    FROM issues
    JOIN users
    ON issues.created_by=users.id");
    $user = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    if ($_POST['location'] === "fullDetails") {
        include_once 'dashboard.description.php';
    } else {
        include_once 'dashboard.view.php';
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
