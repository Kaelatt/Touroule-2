<?php
$isConnected = isset($_SESSION['user']) && !empty($_SESSION['user']) && session_status() != PHP_SESSION_NONE;
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Menu">
    <div class="container">
        <picture class="icon">
            <a href="<?= $origine ?>" title="Retour à l'accueil">
                <img src="<?= $origine.".mvc/.files/img/icone.png" ?>" alt="Icon de Lassa">
            </a>
        </picture>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $origine ?>"> | Home |</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown07" data-bs-toggle="dropdown" aria-expanded="false">Produits</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown07">
                        <li>
                            <a class="dropdown-item" href="<?= $origine."produits/achat" ?>">Acheter un produit</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= $origine."produits/vente" ?>">Vendre un produit</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown07" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown07">
                        <li>
                            <a class="dropdown-item" href="<?= $origine."services/offre" ?>">Offir mes services</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= $origine."services/demande" ?>">Demander un service</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown07" data-bs-toggle="dropdown" aria-expanded="false">Infos</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown07">
                        <li>
                            <a class="dropdown-item" href="<?= $origine."infos/contacts" ?>">Contact</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= $origine."infos/conditions_generale/vente" ?>">Conditions générales de vente</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= $origine."infos/conditions_generale/utilisation" ?>">Conditions générales d'utilisation</a>
                        </li>
                    </ul>
                </li>
                <!--<li class="nav-item">
                    <form style="padding-left: 5em" action="../../../comptes/recherche.php?search=test">
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                    </form>
                </li>-->
            </ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $origine."comptes/panier" ?>">
                        <img src="<?= $origine.".mvc/.files/img/panier.png" ?>">
                    </a>

                    <?php
                    if ($isConnected){
                        $lien = $origine."comptes/profil_utilisateur";
                        $texte = "Bonjour ".$_SESSION['prenom']." ".$_SESSION['nom'];
                        ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown07" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?= $origine.".mvc/.files/img/profil.png" ?>" title="<?= $texte ?>" style="padding-left: 1em"></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown07">
                        <li>
                            <a class="dropdown-item" href="<?= $origine."comptes/profil_utilisateur" ?>">Profil</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= $origine."comptes/deconnexion" ?>">Déconnexion</a>
                        </li>
                    </ul>
                </li>
                        <?php
                    }
                    else{
                        $lien = $origine."comptes/connexion";
                        $texte = "Connectez-vous!";
                        ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $lien ?>">
                        <img src="<?= $origine.".mvc/.files/img/profil.png" ?>" title="<?= $texte ?>" style="padding-left: 1em">
                    </a>
                </li>
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>