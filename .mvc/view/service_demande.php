<?php
$dev = "Lassa";

$title = "Touroule - Offres de services";
$comment = ""; // Optional

ob_start();
/* Page en HTML ↓ */?>
    <header>
        <h1>Offres de services</h1>
        <p>
            <br/><br/>
            <span style="font-size: x-large">
            <strong>
                Tous les offres de service proche de chez vous!
            </strong><br/>
        </span>
    </p>
</header>

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