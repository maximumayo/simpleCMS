<?php
require_once("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>simpleCMS</title>

</head>
<body>

<h2>Login</h2>

<?php echo returnLogInError(); ?>

<form action="process_login.php" method="post">

    <label for="username">Username</label>
    <input type="text" name="username" id="username">

    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <input type="submit" value="Login">
</form>

</body>
</html>