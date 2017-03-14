<?php require_once(__DIR__ . "/../includes/config.php"); ?>
<?php require_once(__DIR__ . "/../includes/functions.php"); ?>
<?php blocker(); ?>
<?php $users = getUsers(); ?>
<?php require_once(__DIR__ . "/../includes/header.php"); ?>
    <h2>Users</h2>
    <div>
        <span class="errorText"><?php echo returnPageError(); ?></span>
    </div>
    <div>
        <?php foreach ($users as $user): ?>
            <p>
                <span><?php echo "Username: " . $user["username"]; ?></span>
                <a href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a>
                <?php if ($_SESSION['id'] != $user['id']): ?>
                    <a href="delete_user.php?id=<?php echo $user['id']; ?>">Delete</a>
                <?php endif; ?>
                <br>
                <span><?php echo "First Name: " . $user["first_name"]; ?> </span>
                <br>
                <span><?php echo "Last Name: " . $user["last_name"]; ?></span>
            </p>

        <?php endforeach; ?>
    </div>
<?php require_once(__DIR__ . "/../includes/footer.php"); ?>