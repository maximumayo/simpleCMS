<?php require_once(__DIR__ . "/../includes/config.php");
require_once(__DIR__ . "/../includes/functions.php");
blocker();
$users = getUsers();
require_once(__DIR__ . "/../includes/header.php"); ?>

    <h2>Users</h2>
    <div><?php echo returnPageError(); ?></div>
    <div>
        <?php foreach ($users as $user): ?>

            <p>
                <span><?php echo $user["first_name"] . " " . $user["last_name"]; ?></span>
                <span><?php echo "USERNAME: " . $user["username"]; ?></span>
            </p>
            <a href="edit.php?id=<?php echo $user['id']; ?>">Edit</a>
            <a href="delete.php?id=<?php echo $user['id']; ?>">Delete</a>

        <?php endforeach; ?>
    </div>

<?php require_once(__DIR__ . "/../includes/footer.php"); ?>