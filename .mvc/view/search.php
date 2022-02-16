<?php
$dev = "Camille";

$title = "Touroule - Ventes de produits";
$comment = "Cette page devra être dynamique avec différents produit présenté."; // Optional

ob_start();
/* Page en HTML ↓ */?>
    <header>
        <h1>Resultat recherche</h1>
        <p>
            <br/><br/>
            <span style="font-size: x-large"><br/>
        </span>
        </p>
    </header>

    <h4>Velo: </h4>
    <br>
    <br>

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
    <br>
    <br>
    <h4>Reparation: </h4>
    <br>
    <br>
    <div class="article" role="article">
        <?php
        if (!empty($reparation)&&!empty($origine)) {
            foreach ($reparation as $r){
                ?>
                <div class="corpArticle" id="a">
                    <a href="<?= $origine."services/service.php?id=".$r->getIdReparation()?>" title="Acceder page article">
                        <h2><?php echo "{$r->getTitre()}"?></h2>
                        <p>
                            <?php echo "{$r->getDescription()}"?>
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