<?php
session_start();

if (isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
}
header("Location: ../../comptes/panier");
?>