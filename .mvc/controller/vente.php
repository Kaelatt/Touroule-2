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

$c = isset($_SESSION['user']) && !empty($_SESSION['user']) && session_status() != PHP_SESSION_NONE;
if(!empty($origine)) {
    if ($c) {
        $types = getTypeList();
        $genre = getGenre();

        include $origine . ".mvc/view/vente.php";
    } else {
        include $origine . ".mvc/controller/connexion.php";

    }
}
?>