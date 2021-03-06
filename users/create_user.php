<?php
require_once(__DIR__ . "/../includes/config.php");
require_once(__DIR__ . "/../includes/functions.php");
blocker();
require_once(__DIR__ . "/../includes/header.php");
?>

    <h2>Create User</h2>
    <div>
        <span class="errorText">
            <?php echo returnPageError(); ?>
        </span>
    </div>

    <form action="process_create_user.php" method="post">

        <label for="username">Username</label>
        <input type="text" name="username" id="username">

        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name">

        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name">

        <button type="submit" value="Create User">Create User</button>

    </form>

<?php require_once(__DIR__ . "/../includes/footer.php"); ?>