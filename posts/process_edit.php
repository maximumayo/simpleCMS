<?php require_once(__DIR__ . "/../includes/config.php");
require_once(__DIR__ . "/../includes/functions.php");
blocker();

$id = $_POST["id"];

if (isset($_POST["published"])) {
    $_POST["published"] = 1;
} else {
    $_POST["published"] = 0;
}

if (editPost($id, $_POST)) {
    header("Location: index.php?id={$id}");
} else {
    header("Location: edit.php?id={$id}&error=could not edit post");
}
?>