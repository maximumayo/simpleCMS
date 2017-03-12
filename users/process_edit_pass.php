<?php
require_once(__DIR__ . "/../includes/config.php");
require_once(__DIR__ . "/../includes/functions.php");

blocker();
startSession();

$id = $_SESSION['id'];

$current_pass = $_POST['current_pass'];
$new_pass = $_POST['new_pass'];
$confirm_pass = $_POST['confirm_pass'];

$error = '';

$user = getUser($id);

if ($new_pass !== $confirm_pass) {
    $error = 'New Password and Confirm Password do not match!';
} elseif (!password_verify($current_pass, $user['password'])) {
    $error = 'Current password does not exist';
} elseif (password_verify($new_pass, $user['password'])) {
    $error = 'Your new password must be different from your current password';
} elseif (strlen(trim($new_pass)) == 0 || strlen(trim($confirm_pass)) == 0) {
    $error = 'Password field must not be left blank';
}

if (strlen($error) > 0) {
    header("Location: /../Projects/simpleCMS/users/edit_user.php?id={$id}&error=$error");
} else {
    $_POST['password'] = password_hash($new_pass, PASSWORD_DEFAULT);
    if (editUserPass($id, $_POST)) {
        header("Location: /../Projects/simpleCMS/users/index.php?id={$id}");
    } else {
        header("Location: /../Projects/simpleCMS/users/edit_user.php?id={$id}&error=Could not change password");
    }
}
?>