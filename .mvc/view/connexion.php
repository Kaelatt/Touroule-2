<?php
$dev = "Coco - Mat - Lassa";

$title = "Connexion";
$comment = "Cette page est là a des fins de test."; // Optional

ob_start();
/* Page en HTML ↓ */?>
    <header>
        <h1>connectez vous  </h1>
        <p>
            <br/><br/>
            <span style="font-size: x-large"><strong>Bienvenue, vous etes de retour !!</strong></strong></span><br/>
        </p>
    </header>
    <form action="<?= $origine.".mvc/controller/setConnexion.php" ?>" method="post">
        <p>mail : </p>
        <input type="email" name="email">
        <br>
        <p>mot de passe  : </p>
        <input type="password" name="password">
        <br>
        <br>
        <br>
        <input type="submit" name="valider" value="se connecter">
    </form>
    <p>
        Pas encore de compte? <a href="<?= $origine."comptes/inscription" ?>">Inscrivez-vous !</a>
    </p>

<?php /* Page en HTML ↑ */
$content = ob_get_clean();

include $origine.".mvc/view/include_require/template.php";
?>