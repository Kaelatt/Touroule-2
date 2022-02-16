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

/* $name (renseigné dans index.php) est le nom de la fiche a ouvrir*/

function age($date)
{
    $age = date('Y') - $date;
    if (date('md') < date('md', strtotime($date))) {
        return $age - 1;
    }
    return $age;
}


if ($name == "Viandier"){
    $prenom = "Benjamin";
    $nom = "VIANDIER CHOCHOIS";

    $dateNaissance = "07-09-2001";
    $aujourdhui = date("Y-m-d");
    $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));

    $mail_iut = "benjamin.chochois@etu.uphf.fr";
    $github = "https://github.com/LassaInora";

    $role = "Référent de groupe - Responsable de la partie controller";
}
elseif ($name == "Frappat"){
    $prenom = "Mathéo";
    $nom = "FRAPPAT";

    $dateNaissance = "26-08-1997";
    $aujourdhui = date("Y-m-d");
    $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));

    $mail_iut = "matheo.frappat@etu.uphf.fr";
    $github = "https://github.com/matheofrappat";

    $role = "Designer du site - Création des diagrammes";
}
elseif ($name == "Thiery"){
    $prenom = "Corentin";
    $nom = "THIERY";

    $dateNaissance = "14-06-2002";
    $aujourdhui = date("Y-m-d");
    $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));

    $mail_iut = "corentin.thiery@etu.uphf.fr";
    $github = "https://github.com/Kaelatt";

    $role = "Architecte du site - Responsable de la partie view";
}
elseif ($name == "Braik"){
    $prenom = "Sofiane";
    $nom = "BRAIK";

    $dateNaissance = "03-05-2001";
    $aujourdhui = date("Y-m-d");
    $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));

    $mail_iut = "sofiane.braik@etu.uphf.fr";
    $github = "https://github.com/fosbrk";

    $role = "Recherche de l’existant - Recherche des fonctionnalités externe";
}
elseif ($name == "Guillier"){
    $prenom = "Camille";
    $nom = "GUILLIER";

    $dateNaissance = "05-08-2002";
    $aujourdhui = date("Y-m-d");
    $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));

    $mail_iut = "camille.guillier@etu.uphf.fr";
    $github = "https://github.com/c-guill";

    $role = "Concepteur de la base de données - Responsable de la partie modèle";
}

include $origine.".mvc/view/fiche.php"

?>