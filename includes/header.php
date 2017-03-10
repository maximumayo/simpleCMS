<?php startSession(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>simpleCMS</title>
</head>
<body>

<ul>
    <li><a href="/../Projects/simpleCMS/index.php">Home</a></li>

    <?php if (isset($_SESSION["id"])): ?>
        <li><a href="/../Projects/simpleCMS/posts/index.php">Posts</a></li>
        <li><a href="/../Projects/simpleCMS/posts/unpublished.php">Unpublished Posts</a></li>
        <li><a href="/../Projects/simpleCMS/posts/create.php">Create Post</a></li>
        <li><a href="/../Projects/simpleCMS/users/index.php">Users</a></li>
        <li><a href="/../Projects/simpleCMS/users/add_user.php">Create User</a></li>
    <?php endif; ?>

    <?php if (isset($_SESSION["id"])): ?>
        <li><a href="/../Projects/simpleCMS/logout.php">Logout</a></li>
    <?php else: ?>
        <li><a href="/../Projects/simpleCMS/index.php">Login</a></li>
    <?php endif; ?>
</ul>

<div>
    <?php echo displayPageMessage(); ?>
</div>