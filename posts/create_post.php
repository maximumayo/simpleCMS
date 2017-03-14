<?php require_once(__DIR__ . "/../includes/config.php"); ?>
<?php require_once(__DIR__ . "/../includes/functions.php"); ?>
<?php blocker(); ?>
<?php require_once(__DIR__ . "/../includes/header.php"); ?>
    <h2>Create Post</h2>
    <div><?php echo returnPageError(); ?></div>

    <form action="process_create_post.php" method="post">

        <div>
            <label for="title">Title of Post</label><br>
            <input type="text" name="title" id="title">
        </div>
        <br>
        <div>
            <label for="body">Body of Post</label><br>
            <textarea name="body" id="body"></textarea>
        </div>
        <br>
        <div>
            <label for="published">
                <input type="checkbox" name="published" id="published" value=1>Publish Post?
            </label>
        </div>
        <br>
        <div>
            <button type="submit" value="Create Post">Create Post</button>
        </div>

    </form>

<?php require_once(__DIR__ . "/../includes/footer.php"); ?>