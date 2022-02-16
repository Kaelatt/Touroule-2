<?php
session_start();

$_SESSION['panier'][] = $_GET['id'];
header("Location: ../../produits/achat");

?>