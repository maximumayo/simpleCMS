<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/header.php"); ?>

    <h2>This simple CMS was made with PHP and MySQL</h2>

    <h3>Welcome back, <?php echo $_SESSION['username']; ?>! </h3>

    <h4><?php echo date('l, F d, Y'); ?></h4>

<?php require_once("includes/footer.php"); ?>