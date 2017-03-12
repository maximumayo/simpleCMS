<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/header.php"); ?>

    <h2>This simple CMS was made with PHP and MySQL</h2>

<?php if (isset($_SESSION["id"])): ?>

    <h3>Welcome back, <?php echo $_SESSION['username']; ?>! </h3>

<?php endif; ?>

    <h4><?php echo date('l, F d, Y'); ?></h4>

<?php require_once("includes/footer.php"); ?>