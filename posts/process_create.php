<?php
require_once(__DIR__ . "/../includes/config.php");
require_once(__DIR__ . "/../includes/functions.php");
blocker();
startSession();

$_POST['user_id'] = $_SESSION['id'];
$_POST['last_updated_by'] = $_SESSION['id'];

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