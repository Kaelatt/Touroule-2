<?php
/* Nous servira surtout pour la personnalisation des pages users, achat et offre
 * Pour initialiser les variables */


/* Variables déjà existantes:
 * $origine -> Chemin vers le dossier primaire de Touroule
 * $title -> Titre de la page
 * $comment -> Un commentaire a faire sur la page /!\ ce commentaire sera visible dans les codes de la page final
 * $content -> Le contenu de la balise article sur le site
 * $dev -> Les personnes qui ont participé au développement de cette page. (Visible dans les codes de la page final)
 * */

if (isset($_GET['id'])){
    $user = getCompteid($_GET['id']);
}
elseif (isset($_SESSION['user'])){
    $user = getCompteid($_SESSION['user']);
}

$prenom = $user->getPrenom();
$nom = $user->getNom();
$mail = $user->getMail();
$cp = $user->getCodepostal();
$ville = $user->getVille();

include $origine.".mvc/view/profil_utilisateur.php";
?>