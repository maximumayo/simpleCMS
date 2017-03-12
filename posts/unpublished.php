<?php require_once(__DIR__ . "/../includes/config.php"); ?>
<?php require_once(__DIR__ . "/../includes/functions.php"); ?>
<?php blocker(); ?>
<?php $posts = getUnpublishedPosts(); ?>
<?php require_once(__DIR__ . "/../includes/header.php"); ?>
    <h2>Unpublished Posts</h2>
    <h4>Currently logged in as: <?php echo $_SESSION['username']; ?> </h4>
    <div><?php echo returnPageError(); ?></div>
    <div>
        <!--loop through and display content from db-->
        <?php foreach ($posts as $post): ?>
            <p>
                <span><?php echo $post["title"]; ?></span>
                <a href="edit.php?id=<?php echo $post['id'] ?>">Edit</a>
                <a href="publish.php?id=<?php echo $post['id'] ?>">Delete</a>
                <a href="publish.php?id=<?php echo $post['id'] ?>">Publish</a>
                <br><span><?php echo $post["body"]; ?></span>
                <br><span>created by: <?php echo $post['creator']; ?></span>
                <br><span>last updated by: <?php echo $post['updater']; ?></span>
            </p>
        <?php endforeach; ?>
    </div>
<?php require_once(__DIR__ . "/../includes/footer.php"); ?>