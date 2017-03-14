<?php
require_once(__DIR__ . "/../includes/config.php");
require_once(__DIR__ . "/../includes/functions.php");
startSession();
$_POST["password"] = password_hash($_POST["username"], PASSWORD_DEFAULT);

$validation = validateLogin($_POST);

//prevent duplicate username
$username = $_POST["username"];

$user = findUser($username);

if (count($user) > 0) {
    exit ("username already exists. please choose a different username." . " " . "<a href='create_user.php'>I understand</a>");
}

if (createUser($_POST)) {
    header("Location: index.php");
} else {
    header("Location: create_user.php?error=could not create user");
}
?>