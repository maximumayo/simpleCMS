<?php
require_once("includes/functions.php");

startSession();

$_SESSION = [];

session_destroy();

header("Location: /../Projects/simpleCMS/index.php");

?>