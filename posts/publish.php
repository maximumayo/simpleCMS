<?php

require_once(__DIR__ . "/../includes/config.php");

require_once(__DIR__ . "/../includes/functions.php");

blocker();

$id = $_GET["id"];

if (publishPost($id)) {
    header("Location: unpublished.php");
} else {
    header("Location: unpublished.php?message=Could not publish post");
}
?>