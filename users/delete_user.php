<?php
require_once(__DIR__ . "/../includes/config.php");
require_once(__DIR__ . "/../includes/functions.php");

$id = $_GET['id'];
startSession();

if ($_SESSION['id'] == $id) {
    header("Location: /../Projects/simpleCMS/users/index.php?error=you cannot delete your own account");
}

if (deleteUser($id)) {
    header("Location: /../Projects/simpleCMS/users/index.php");
} else {
    header("Location: /../Projects/simpleCMS/users/index.php?error=could not delete user");
}
?>