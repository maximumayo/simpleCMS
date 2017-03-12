<?php require_once(__DIR__ . "/../includes/config.php"); ?>
<?php require_once(__DIR__ . "/../includes/functions.php"); ?>
<?php blocker(); ?>
<?php $users = getUsers(); ?>
<?php require_once(__DIR__ . "/../includes/header.php"); ?>
    <h2>Users</h2>
    <h4>Currently logged in as: <?php echo $_SESSION['username']; ?> </h4>
    <div><?php echo returnPageError(); ?></div>
    <div>
        <?php foreach ($users as $user): ?>
            <p>
                <span><?php echo "USERNAME: " . $user["username"]; ?></span>
                <span><?php echo "FIRST NAME: " . $user["first_name"] . " " . "LAST NAME: " . $user["last_name"]; ?></span>
            </p>
            <a href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a>
            <?php if ($_SESSION['id'] != $user['id']): ?>
                <a href="delete_user.php?id=<?php echo $user['id']; ?>">Delete</a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php require_once(__DIR__ . "/../includes/footer.php"); ?>