<?php require_once(__DIR__ . "/../config.php"); ?>
<?php require_once(__DIR__ . "/../functions.php"); ?>
<?php $posts = getPosts(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pages</title>
</head>
<body>

<h2>Posts</h2>

<div>
    <!--loop through and diplay content from db-->
    <?php foreach ($posts as $post): ?>
        <p><?php echo $post["title"]; ?></p>
    <?php endforeach; ?>
</div>

</body>
</html>