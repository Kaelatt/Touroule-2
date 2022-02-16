<!-- <?= $comment ?> -->

<!doctype html>
<html lang="fr">
<head>
    <title><?= $title ?></title>
    <?php include $origine.".mvc/view/include_require/metahead.php" ?>
</head>

<body class="parent">
<?php include $origine.".mvc/view/include_require/header.php" ?>

<article class="corp">
    <?= $content ?>
</article>


<footer class="footer">
    <?php include $origine.".mvc/view/include_require/footer.php" ?>
</footer>

</body>
<script src="<?= $origine.".mvc/.files/js/bootstrap.bundle.min.js"?>"></script>
</html>

<!-- Page réalisée par <?= $dev ?> -->