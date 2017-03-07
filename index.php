<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/header.php"); ?>

    <h2>Login</h2>

<?php echo returnLogInError(); ?>

    <form action="process_login.php" method="post">

        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Login">

    </form>

<?php require_once("includes/footer.php"); ?>