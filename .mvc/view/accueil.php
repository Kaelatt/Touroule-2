<?php
$dev = "Lassa - Sofiane";

$title = "";
$comment = ""; // Optional

ob_start();
/* Page en HTML ↓ */?>
    <header>
        <h1>Bienvenue !</h1>
        <p>
            <br/><br/>
            <span style="font-size: x-large">
                <strong>
                    Pourquoi ce site?
                </strong><br/>
            </span>
        </p>
    </header>

    <div class="sommaire" role="navigation">
        <h3>Sommaire:</h3>
        <ul>
            <li>
                <a href="#Produits">
                    "Produits"
                </a>
                <ul>
                    <li>
                        <a href="#Vendre">
                            "Vendre mes produits"
                        </a>
                    </li>
                    <li>
                        <a href="#Acheter">
                            "Acheter des produits"
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#Services">
                    "Services"
                </a>
                <ul>
                    <li>
                        <a href="#Offrir">
                            "Offir mes services"
                        </a>
                    </li>
                    <li>
                        <a href="#Demander">
                            "Demander des services"
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#Infos">
                    "Les Infos"
                </a>
                <ul>
                    <li>
                        <a href="#Contacter">
                            "Nous contacter"
                        </a>
                    </li>
                    <li>
                        <a href="#CGU">
                            "Conditions générales d'utilisation"
                        </a>
                    </li>
                    <li>
                        <a href="#CGV">
                            "Conditions générales de vente"
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="article" role="article">
        <div class="corpArticle" id="Produits">
            <h2>Les produits</h2>
            <p>Cet onglet permet de pouvoir vendre vos produits et d'acheter des produits que nous proposons sur un listing de plusieurs marques et pour tous les profils possible.  </p>
            <div class="sousCorpArticle" id="Vendre">
                <h4>Vendre mes produits</h4>
                <p>Cet onglet vous permet de vendre tous vos produits.</p>
            </div>
            <div class="sousCorpArticle" id="Acheter">
                <h4>Acheter des produits</h4>
                <p>Cet onglet réunit les produits disponibles sur notre site et vous permettre ainsi de réaliser votre meilleure choix sur notre catalogue.</p>
            </div>
        </div>
        <div class="corpArticle" id="Services">
            <h2>Les services</h2>
            <p>Cet onglet réunit tout ce qui concerne les services que nous proposons à nos clients  </p>
            <div class="sousCorpArticle" id="Offrir">
                <h4>Offrir mes services</h4>
                <p>Cet onglet vous permet de proposer vos services.</p>
            </div>
            <div class="sousCorpArticle" id="Demander">
                <h4>Demander des services</h4>
                <p>Cet onglet réunit les offres de services disponibles dans le secteur.</p>
            </div>
        </div>
        <div class="corpArticle" id="Infos">
            <h2>Les infos</h2>
            <p>Cette rubrique va réunir toutes les informations sur les Conditions générales de ventes et d'utilisation et d'une page Contact pour discuter avec l'équipe pour des éventuels problèmes ou conseil à nous demander.</p>
            <div class="sousCorpArticle" id="Contacter">
                <h4>Nous contacter</h4>
                <p>Vous avez une question à poser à notre équipe ? Pas de soucis, veuillez nous écrire pour toute information supplémentaire à l'adresse suivante : contact@touroule.com </p>
            </div>
            <div class="sousCorpArticle" id="CGU">
                <h4>CGU</h4>
                <p>CONDITIONS GENERALES D'UTILISATION</p>
                <p>Les présentes Conditions Générales d'Utilisation définissent les conditions dans lesquelles Touroule met à la disposition des Vendeurs les outils technologiques leur permettant de vendre leurs Produits et leurs services de réparation aux Clients, tels que présentés sur le site Internet www.Touroule.com par l'intermédiaire de la Plateforme.</p>
            </div>
            <div class="sousCorpArticle" id="CGV">
                <h4>CGV</h4>
                <p>CONDITIONS GENERALES DE VENTE DES PRODUITS MIS EN VENTE SUR NOTRE SITE DE VENTE ET REPARATION DE VELO :</p>
                <p>PRODUITS</p>
                <p>Nos produits mise en vente sur notre plateforme sont des produits neufs et d'occasion.<br> Le Vendeur s’engage à délivrer une information complète et conforme sur les caractéristiques des Produits mis
                    en vente sur la Plateforme. ²A ce titre, lorsqu’il crée une offre pour la mise en vente d’un Produit sur la Plateforme,
                    le Vendeur fournit un descriptif et une ou plusieurs photos du Produit permettant à l’Acheteur de connaître ses
                    caractéristiques essentielles, son état, son prix et le délai de livraison.
                    Le Vendeur est seul responsable de la complétude du descriptif et de la conformité du Produit vendu. </p>
            </div>
        </div>
    </div>
<?php /* Page en HTML ↑ */
$content = ob_get_clean();

include $origine.".mvc/view/include_require/template.php";
?>