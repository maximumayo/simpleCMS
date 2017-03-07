<?php require_once(__DIR__ . "/../includes/config.php"); ?>
<?php require_once(__DIR__ . "/../includes/functions.php"); ?>
<?php $posts = getPosts(); ?>

<?php require_once(__DIR__ . "/../includes/header.php"); ?>

    <h2>Posts</h2>

    <div>
        <!--loop through and diplay content from db-->
        <?php foreach ($posts as $post): ?>
            <p><?php echo $post["title"]; ?></p>
        <?php endforeach; ?>
    </div>

<?php require_once(__DIR__ . "/../includes/footer.php"); ?>