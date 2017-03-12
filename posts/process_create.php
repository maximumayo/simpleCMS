<?php
require_once(__DIR__ . "/../includes/config.php");
require_once(__DIR__ . "/../includes/functions.php");
blocker();
startSession();

$_POST['user_id'] = $_SESSION['id'];
$_POST['last_updated_by'] = $_SESSION['id'];

//fields must not be left blank
$toBeValidated = ['title', 'body', 'user_id', 'last_updated_by'];

$validation = doValidation($_POST, $toBeValidated);

if (!$validation[0]) {
    $error = $validation[1];
    $error = http_build_query(array('error' => $error));
    header("Location: /../Projects/simpleCMS/posts/create.php?" . $error);
    exit;
}

if (isset($_POST["published"])) {
    $_POST["published"] = 1;
} else {
    $_POST["published"] = 0;
}

if (createPost($_POST)) {
    header("Location: index.php");
} else {
    header("Location: create.php?error=could not create page");
}
?>