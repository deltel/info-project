<?php

session_start();

session_unset();
session_destroy();

//header("Location: login.view.php");
echo "login.html";
die();