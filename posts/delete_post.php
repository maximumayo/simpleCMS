<?php require_once(__DIR__ . "/../includes/config.php"); ?>
<?php require_once(__DIR__ . "/../includes/functions.php"); ?>
<?php
$id = $_GET["id"];
if (deletePost($id)) {
    header("Location: index.php");
} else {
    header("Location: index.php?error=Could not delete post");
}
?>