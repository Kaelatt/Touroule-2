<?php
$origine = '../../';
require ('chargeClass.php');

if ($_SESSION['admin']) {
    supprimerCompte((int) $_GET['id']);
}

header("Location: ".$origine);
?>