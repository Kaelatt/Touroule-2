<?php
session_start();

if (isset($_SESSION['panier'])){
    unset($_SESSION['panier'][array_search((int)($_GET['id']), $_SESSION['panier'])]);
}
header("Location: ../../comptes/panier");
?>