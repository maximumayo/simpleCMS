<?php startSession(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>simpleCMS</title>
    <link rel="stylesheet" href="/../Projects/simpleCMS/style.css">
</head>
<body>

<ul>
    <li><a href="/../Projects/simpleCMS/home.php">Home</a></li>
    <!--only display when user is logged in-->
    <?php if (isset($_SESSION["id"])): ?>
        <li><a href="/../Projects/simpleCMS/posts/index.php">Posts</a></li>
        <li><a href="/../Projects/simpleCMS/posts/unpublished.php">Unpublished Posts</a></li>
        <li><a href="/../Projects/simpleCMS/posts/create_post.php">Create Post</a></li>
        <li><a href="/../Projects/simpleCMS/users/index.php">Users</a></li>
        <li><a href="/../Projects/simpleCMS/users/add_user.php">Create User</a></li>
        <li id="currentlyLogged">Currently logged in as: <?php echo $_SESSION['username'] . " " .
                "<a href='/../Projects/simpleCMS/logout.php'>[ log out ]</a>"; ?>
        </li>
    <?php else: ?>
        <li id="logIn"><a href="/../Projects/simpleCMS/index.php">[ log in ]</a></li>
    <?php endif; ?>
</ul>

<div>
    <?php echo displayPageMessage(); ?>
</div>