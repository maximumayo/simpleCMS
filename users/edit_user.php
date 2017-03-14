<?php require_once(__DIR__ . "/../includes/config.php"); ?>
<?php require_once(__DIR__ . "/../includes/functions.php"); ?>
<?php blocker(); ?>
<?php require_once(__DIR__ . "/../includes/header.php"); ?>
<?php $user = getUser($_GET["id"]); ?>

    <h2>Edit User</h2>
    <div><?php echo returnPageError(); ?></div>

    <form action="process_edit_user.php" method="post">

        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo $user['username'] ?>">

        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" value="<?php echo $user['first_name'] ?>">

        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="<?php echo $user['last_name'] ?>">

        <button type="submit" value="Update User">Update User</button>

    </form>

<?php if ($_SESSION['username'] == $user['username']): ?>
    <?php if (password_verify($user['username'], $user['password'])): ?>

        <p>
            <span>
                By default your password is your username. Please change your password to secure your account.
            </span>
        </p>

    <?php endif; ?>

    <h2>Update User Password</h2>

    <form action="process_edit_pass.php" method="post">

        <label for="current_pass">Current Password</label>
        <input type="password" id="current_pass" name="current_pass">

        <label for="new_pass">New Password</label>
        <input type="password" id="new_pass" name="new_pass">

        <label for="confirm_pass">Confirm New Password</label>
        <input type="password" id="confirm_pass" name="confirm_pass">

        <button type="submit" value="Change Password">Change Password</button>

    </form>

<?php endif; ?>

<?php require_once(__DIR__ . "/../includes/footer.php"); ?>