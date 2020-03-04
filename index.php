<?php
session_start();
if (!isset($_SESSION['id']) or $_SESSION['loggedin'] !== true) {
    header('location: login.html');
    //echo "login.html";
} else if ($_SESSION['id'] === 'admin@bugme.com') {
    //header('location: addUser.view.php');
    switch ($_POST['location']) {
        case "home":
            echo "dashboard.html";
            break;
        case "addUser":
            echo "addUser.html";
            break;
        case "newIssue":
            echo "createIssue.html";
            break;
        default:
            echo "dashboard.html";
            break;
    }
/*
    if ($_POST['location'] === "createIssue.html") {
        echo "createIssue.html";
    } else {
        echo "addUser.html";
    }

    */
} else if (isset($_SESSION['id']) and $_SESSION['loggedin']) {
    switch ($_POST['location']) {
        case "home":
            echo "dashboard.html";
            break;
        case "newIssue":
            echo "createIssue.html";
            break;
        default:
            echo "dashboard.html";
            break;
    }
    /*
    if ($_POST['location'] === "createIssue.html") {
        echo "createIssue.html";
    } else {
        echo "dashboard.html";
    }
    */
}
