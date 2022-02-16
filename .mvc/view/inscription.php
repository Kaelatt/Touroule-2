<?php
$dev = "Coco - Mat - Lassa";

$title = "Création de profil";
$comment = "Création du profil"; // Optional

ob_start();
/* Page en HTML ↓ */?>

<head>
    <title>Touroule</title>
</head>
<body class="parent">
<article class="corp">
    <header>
        <h1>Création du profil</h1>
        <p>
            <br/><br/>
            <span style="font-size: x-large"><strong>Entrez vos informations</strong></strong></span><br/>
        </p>
    </header>


    <form action="<?= $origine.'.mvc/controller/profilMaker.php' ?>" method="post">
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
        <input type="email"  name="mail">
        <br>
        <p>Code postal  : </p>
        <input type="number"  name="cp">
        <br>
        <p>Ville : </p>
        <input type="text"  name="ville">
        <input type="submit" name="valider" value="Valider">
    </form>
    <p>
        Déjà un compte? <a href="<?= $origine."comptes/connexion" ?>">Connectez-vous !</a>
    </p>
</article>
</body>

<?php /* Page en HTML ↑ */
$content = ob_get_clean();

include $origine.".mvc/view/include_require/template.php";
?>

