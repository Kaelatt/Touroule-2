<?php
$origine = '../../';
require ('chargeClass.php');
require '../modele/Reparation.php.php';

if ($_SESSION['admin']) {
    supprimerReparation((int) $_GET['id']);
}

header("Location: ".$origine);
?>