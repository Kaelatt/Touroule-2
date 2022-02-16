<!doctype html>
<html lang="fr">
<head>
    <title>Erreur <?= $codeError ?></title>
    <?php include '../view/metahead.php' ?>
</head>

<body class="parent">
<?php include '../view/header.php' ?>

<article class="corp">
    <header>
        <h1>Erreur <?= $codeError ?> : <?= $nameError ?></h1>
        <p>
            <br/><br/>
            <span style="font-size: x-large">
            <strong><?= $descError ?></strong><br/>
            <img class="imageError" src="gif/<?= $codeError ?>.gif"/>
        </span>
        </p>
    </header>
</article>


<footer class="footer">
    <?php include '../view/footer.php' ?>
</footer>

</body>
<script src="../.files/js/bootstrap.bundle.min.js"></script>
</html>