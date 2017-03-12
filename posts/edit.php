<?php require_once(__DIR__ . "/../includes/config.php"); ?>
<?php require_once(__DIR__ . "/../includes/functions.php"); ?>
<?php blocker(); ?>
<?php require_once(__DIR__ . "/../includes/header.php"); ?>
<?php $post = getPost($_GET["id"]); ?>

    <h2>Edit Post</h2>
    <h4>Currently logged in as: <?php echo $_SESSION['username']; ?> </h4>
    <div>
        <?php echo returnPageError(); ?>
    </div>

    <form action="process_edit.php" method="post">

        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">

        <div>
            <label for="title">Title of Post</label>
            <input type="text" name="title" id="title" value="<?php echo $post['title']; ?>">
        </div>

        <div>
            <label for="body">Body of Post</label>
            <textarea name="body" id="body">
            <?php echo $post["body"]; ?>
        </textarea>
        </div>

        <div>
            <label for="published">
                <input type="checkbox" name="published" id="published" value=1
                    <?php if ($post["published"] == 1) {
                        echo "checked";
                    } ?>>Publish Post?
            </label>
        </div>

        <div>
            <input type="submit" value="Update Post">
        </div>
    </form>

<?php require_once(__DIR__ . "/../includes/footer.php"); ?>