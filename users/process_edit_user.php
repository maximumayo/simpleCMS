<?php
require_once(__DIR__ . "/../includes/config.php");
require_once(__DIR__ . "/../includes/functions.php");

$id = $_POST['id'];

//fields must not be left blank
$toBeValidated = ['username', 'first_name', 'last_name'];

$validation = doValidation($_POST, $toBeValidated);

if (!$validation[0]) {
    $error = $validation[1];
    $error = http_build_query(array('error' => $error));
    header("Location: /../Projects/simpleCMS/users/edit_user.php?id={$id}&" . $error);
    exit;
}

if (editUser($id, $_POST)) {
    $user = getUser($id);
    $_SESSION['username'] = $user["username"];
    header("Location: /../Projects/simpleCMS/users/index.php?id={$id}");
} else {
    header("Location: edit_user.php?id={$id}&error=could not update user");
}