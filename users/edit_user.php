<?php
require_once(__DIR__ . "/../includes/config.php");
require_once(__DIR__ . "/../includes/functions.php");
blocker();
require_once(__DIR__ . "/../includes/header.php");
$user = getUser($_GET["id"]);
?>

    <h2>Add User</h2>
    <div><?php echo returnPageError(); ?></div>

    <form action="process_edit_user.php" method="post">

        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo $user['username'] ?>">

        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" value="<?php echo $user['first_name'] ?>">

        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="<?php echo $user['last_name'] ?>">

        <input type="submit" value="Update User">

    </form>

<?php require_once(__DIR__ . "/../includes/footer.php"); ?>