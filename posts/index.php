<?php require_once(__DIR__ . "/../includes/config.php"); ?>
<?php require_once(__DIR__ . "/../includes/functions.php"); ?>
<?php blocker(); ?>
<?php $posts = getPosts(); ?>
<?php require_once(__DIR__ . "/../includes/header.php"); ?>
    <h2>Posts</h2>
    <div>
        <span class="errorText">
            <?php echo returnPageError(); ?>
        </span>
    </div>
    <div>
        <!--loop through and display content from db-->
        <?php foreach ($posts as $post): ?>
            <p>
                <span class="postTitle"><?php echo $post["title"]; ?></span>
                <a href="edit_post.php?id=<?php echo $post['id'] ?>">Edit</a>
                <a href="delete_post.php?id=<?php echo $post['id'] ?>">Delete</a>
                <br><span><?php echo $post["body"]; ?></span>
                <br><span>Created by: <?php echo $post['creator']; ?></span>
                <br><span>Last updated by: <?php echo $post['updater']; ?></span>
            </p>
        <?php endforeach; ?>
    </div>
<?php require_once(__DIR__ . "/../includes/footer.php"); ?>