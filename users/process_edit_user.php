<?php
require_once(__DIR__ . "/../includes/config.php");
require_once(__DIR__ . "/../includes/functions.php");

$id = $_POST['id'];

if (editUser($id, $_POST)) {
    $user = getUser($id);
    $_SESSION['username'] = $user["username"];
    header("Location: /../Projects/simpleCMS/users/index.php?id={$id}");
} else {
    header("Location: edit_user.php?id={$id}&error=could not update user");
}
?>