<?php require_once(__DIR__ . "/../includes/config.php"); ?>
<?php require_once(__DIR__ . "/../includes/functions.php"); ?>
<?php blocker(); ?>
<?php $posts = getPosts(); ?>
<?php require_once(__DIR__ . "/../includes/header.php"); ?>
    <h2>Posts</h2>
<?php if (isset($_SESSION["id"])): ?>
    <h4>Currently logged in as: <?php echo $_SESSION['username']; ?> </h4>
<?php endif; ?>
    <div><?php echo returnPageError(); ?></div>
    <div>
        <!--loop through and display content from db-->
        <?php foreach ($posts as $post): ?>
            <p>
                <span><?php echo $post["title"]; ?></span>
                <a href="edit_post.php?id=<?php echo $post['id'] ?>">Edit</a>
                <a href="delete_post.php?id=<?php echo $post['id'] ?>">Delete</a>
                <br><span><?php echo $post["body"]; ?></span>
                <br><span>Created by: <?php echo $post['creator']; ?></span>
                <br><span>Last updated by: <?php echo $post['updater']; ?></span>
            </p>
        <?php endforeach; ?>
    </div>
<?php require_once(__DIR__ . "/../includes/footer.php"); ?>