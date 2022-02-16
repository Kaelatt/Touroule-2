<?php
$dev = "Lassa";

$title = "";
$comment = ""; // Optional

ob_start();
/* Page en HTML ↓ */?>
<header>
    <h1>Ajouter un service</h1>
    <p>
        <br/><br/>
        <span style="font-size: x-large">
            <strong>
                Renseignez les informations pour ajouter un produit!
            </strong><br/>
        </span>
    </p>
</header>

<div class="article" role="article">
    <div class="corpArticle" id="filtres">
        <form name="ajout" method="post" action="<?= $origine. ".mvc/controller/CreationService.php" ?>" style="font-size: 1vw">
            <h5>Annonce : </h5>
            <table style="width: max-content">
                <tr>
                    <td>
                        <label for="titre"><p>Titre</p></label>
                    </td>
                    <td>
                        <input  type="text" required="required" name="titre" style="width: 40vw; value="<?php if (isset($_POST['titre'])) echo htmlspecialchars($_POST['titre']);?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Description"><p>Description</p></label>
                    </td>
                    <td>
                        <textarea  name="description" required="required" style="width: 40vw; "><?php if (isset($_POST['description'])) echo htmlspecialchars($_POST['description']);?></textarea>
                    </td>
                </tr>
            </table>
            <h5>Catégories : </h5>
            <table style="width: max-content">


                        <?php

                        if(!empty($categories)) {
                            foreach ($categories as $c) {
                                ?>
                <tr>
                            <td>
                                <label for="name"><p><?php echo "{$c->getNom()}"?></p></label>
                            </td>
                            <td>
                                <input  type="checkbox" name="{<?php $c->getIdCategorie()?>}" style="width: 40vw; value="<?php if (isset($_POST['{$c->getIdCategorie()}'])) echo htmlspecialchars('{$c->getIdCategorie()}');?>">
                            </td>
                </tr>

                                <?php

                            }
                        }
                        ?>

                <tr>
                    <td colspan="2" style="text-align:center">
                        <input type="submit" value="envoyer" style="width: 15vw">
                    </td>
                </tr>


            </table>
        </form>


    </div>
</div>
<?php /* Page en HTML ↑ */
$content = ob_get_clean();

include $origine.".mvc/view/include_require/template.php";
?>
