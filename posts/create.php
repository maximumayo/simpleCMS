<?php require_once(__DIR__ . "/../includes/config.php"); ?>
<?php require_once(__DIR__ . "/../includes/functions.php"); ?>
<?php require_once(__DIR__ . "/../includes/header.php"); ?>

    <h2>Add Post</h2>
    <div>
        <?php echo returnPageError(); ?>
    </div>

    <form action="process_create.php" method="post">

        <div>
            <label for="title">Title of Post</label>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="body">Body of Post</label>
            <textarea name="body" id="body"></textarea>
        </div>

        <div>
            <label for="published">
                <input type="checkbox" name="published" id="published" value=1>Publish Post?
            </label>
        </div>

        <div>
            <input type="submit" value="Create Post">
        </div>

    </form>

<?php require_once(__DIR__ . "/../includes/footer.php"); ?>