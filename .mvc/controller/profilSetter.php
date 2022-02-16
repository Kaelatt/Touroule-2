<?php
try{
    $origine = "../../";
    require 'chargeClass.php';

    $user = getCompteid($_SESSION['user']);
    if (isset($_POST['valider'])){
        if ($_POST['password'] == $_POST['confirmer_mdp']){
            $user->setPassword($_POST['password']);
        }
        $user->setPrenom($_POST['prenom']);
        $_SESSION['prenom'] = $_POST['prenom'];

        $user->setNom($_POST['nom']);
        $_SESSION['nom'] = $_POST['nom'];

        $user->setMail($_POST['email']);
        $_SESSION['email'] = $_POST['email'];

        $user->setCodepostal($_POST['cp']);
        $_SESSION['cp'] = $_POST['cp'];

        $user->setVille($_POST['ville']);
        $_SESSION['ville'] = $_POST['ville'];

        updateCompte($user->getIdCompte(), $user);
    }

    header('Location: ../../comptes/profil_utilisateur');
}
catch (Error $exception){
    echo $exception;
}
?>