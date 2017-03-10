<?php
require_once(__DIR__ . "/../includes/config.php");
require_once(__DIR__ . "/../includes/functions.php");

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