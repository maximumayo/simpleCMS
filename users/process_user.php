<?php
require_once(__DIR__ . "/../includes/config.php");
require_once(__DIR__ . "/../includes/functions.php");

$_POST["password"] = password_hash($_POST["username"], PASSWORD_DEFAULT);

if (createUser($_POST)) {
    header("Location: index.php");
} else {
    header("Location: add_user.php?error=could not create user");
}

?>