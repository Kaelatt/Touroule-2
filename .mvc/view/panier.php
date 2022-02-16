<?php
$dev = "Lassa - Camille";

$title = "Touroule - Panier";
$comment = "Cette page devra être dynamique avec différents produit présenté."; // Optional

ob_start();
/* Page en HTML ↓ */?>
    <header>
        <h1>Votre panier</h1>
        <p>
            <br/><br/>
            <span style="font-size: x-large"><br/>
        </span>
        </p>
    </header>



    <div class="article" role="article">
        <?php
        if (!empty($velo)&&!empty($origine)) {
            foreach ($velo as $v){
                $article = getVelo($v)
                ?>
                <div class="corpArticle" id="a">
                    <a href="<?= $origine."produits/produit.php?id=".$article->getIdVelo()?>" title="Acceder page article">
                        <h2><?php echo "{$article->getTitre()}"?></h2>
                        <p>
                            <?php echo "{$article->getDescription()}"?>
                        </p>
                    </a>
                    <a href="<?= $origine.".mvc/controller/subProduit.php?id=".$article->getIdVelo()?>" title="Supprimer du panier"><button>Supprimer du panier</button></a>
                </div>
                <?php
            }
        }
        ?>
        <a href="<?= $origine.".mvc/controller/valideAchat.php"?>" title="Confirmer achat"><button>Acheter</button></a>
    </div>
<?php /* Page en HTML ↑ */
$content = ob_get_clean();

include $origine.".mvc/view/include_require/template.php";
?>