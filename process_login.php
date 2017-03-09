<?php
require_once("includes/config.php");
require_once("includes/functions.php");

$username = $_POST["username"];
$password = $_POST["password"];

$validation = validateLogin($_POST);

if (!$validation[0]) {
    $error = http_build_query(array("error" => $validation[1]));
    header("Location: index.php?" . $error);
    exit;
}

$user = findUser($username);

if (count($user) > 1) {
    exit ("duplicate username");
}

if (count($user) === 0 || !password_verify($password, $user[0]["password"])) {
    exit ("username or password is invalid");
}

$user = $user[0];
//take user to posts page when logged in
if (loginUser($user)) {
    header("Location: posts/index.php");
} else {
    echo "could not log in user";
}