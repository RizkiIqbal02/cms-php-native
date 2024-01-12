<?php include "partials/header.php"; ?>
<h1><? echo $content ?></h1>

<?= $_SESSION['user']['password'] ?>
<?= urlencode($_SESSION['user']['name']) ?>

<?php include "partials/footer.php"; ?>