<?php
$dev = "Lassa - Camille";

$title = "Touroule - Ventes de produits";
$comment = "Cette page devra être dynamique avec différents produit présenté."; // Optional

ob_start();
/* Page en HTML ↓ */?>
    <header>
        <h1>Ventes de produits</h1>
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
                ?>
                <div class="corpArticle" id="a">
                    <a href="<?= $origine."produits/produit.php?id=".$v->getIdVelo()?>" title="Acceder page article">
                    <h2><?php echo "{$v->getTitre()}"?></h2>
                    <p>
                        <?php echo "{$v->getDescription()}"?>
                    </p>
                    </a>

                </div>
                <?php
            }
        }
        ?>
    </div>
<?php /* Page en HTML ↑ */
$content = ob_get_clean();

include $origine.".mvc/view/include_require/template.php";
?>