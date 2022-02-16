<?php
$origine = "../../";
require ('chargeClass.php');
ini_set("soap.wsdl_cache_enable", "0");

if (isset($_POST['valider'])){
    $user=getCompte($_POST['email'],$_POST['password']);

    if ($user!=null){
        try{
            $_SESSION['user'] = $user->getIdCompte();
            $_SESSION['prenom'] = $user->getPrenom();
            $_SESSION['nom'] = $user->getNom();
            $_SESSION['mail'] = $user->getMail();
            $_SESSION['admin'] = $user->getAdmin();
            $_SESSION['codepostal'] = $user->getCodepostal();
            $_SESSION['ville'] = $user->getVille();

            header("Location: ../../comptes/profil_utilisateur");
            exit;
        }
        catch (Exception $e){
            die('Erreur : ' .$e->getMessage());
        }
    }
    else{
        header("Location: ../../comptes/connexion");
    }
}
?>