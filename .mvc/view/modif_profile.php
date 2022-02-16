<?php
$dev = "Coco - Mat - Lassa";

$title = "Modifier le profil";
$comment = "Modificatoin du profil"; // Optional

ob_start();
/* Page en HTML ↓ */?>

<head>
    <title>Touroule</title>
</head>
<body class="parent">
<article class="corp">
    <header>
        <h1>Modification du profil</h1>
        <p>
            <br/><br/>
            <span style="font-size: x-large"><strong>Modifiez les informations que vous voulez</strong></strong></span><br/>
        </p>
    </header>


    <form action="<?= $origine.'.mvc/controller/profilSetter.php' ?>" method="post">
        <p>Prénom : </p>
        <input type="text" name="prenom">
        <br>
        <p>Nom : </p>
        <input type="text" name="nom">
        <br>
        <p>Mot de passe  : </p>
        <input type="password" name="password">
        <br>
        <p>Confirmer mot de passe  : </p>
        <input type="password" name="confirmer_mdp">
        <br>
        <p>Mail  : </p>
        <input type="email"  name="email">
        <br>
        <p>Code postal  : </p>
        <input type="number"  name="cp">
        <br>
        <p>Ville : </p>
        <input type="text"  name="ville">
        <input type="submit" name="valider" value="Valider">
    </form>
</article>
</body>

<?php /* Page en HTML ↑ */
$content = ob_get_clean();

include $origine.".mvc/view/include_require/template.php";
?>

