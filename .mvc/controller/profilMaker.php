<?php
try{
    $origine = "../../";
    require 'chargeClass.php';

    $user = getCompteid($_SESSION['user']);
    if (isset($_POST['valider'])){
        if ($_POST['password'] == $_POST['confirmer_mdp']){
            creerCompte($_POST['prenom'], $_POST['nom'], $_POST['password'], $_POST['mail'], $_POST['cp'],$_POST['ville']);

            $user = getCompte($_POST['mail'], $_POST['password']);

            $_SESSION['user'] = $user->getIdCompte();
            $_SESSION['prenom'] = $user->getPrenom();
            $_SESSION['nom'] = $user->getNom();
            $_SESSION['mail'] = $user->getMail();
            $_SESSION['admin'] = $user->getAdmin();
            $_SESSION['codepostal'] = $user->getCodepostal();
            $_SESSION['ville'] = $user->getVille();
        }
    }

    header('Location: ../../comptes/profil_utilisateur');
}
catch (Error $exception){
    echo $exception;
}
?>