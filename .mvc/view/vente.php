<?php
$dev = "Frappat";

$title = "";
$comment = ""; // Optional

ob_start();
/* Page en HTML ↓ */?>
<header>
    <h1>Ajouter un produit</h1>
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
        <form name="ajout" method="post" action="<?= $origine. ".mvc/controller/CreationProduit.php" ?>" style="font-size: 1vw">
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
                        <textarea  name="description" required="required" style="width: 40vw; "><?php if (isset($_POST['description'])) echo htmlspecialchars($_POST['escription']);?></textarea>
                    </td>
                </tr>
            </table>
            <h5>caractéristique principaux : </h5>
            <table style="width: max-content">
                <tr>
                    <td>
                        <label for="Marque"><p>Marque</p></label>
                    </td>
                    <td>
                        <input  type="text" name="marque" required="required" style="width: 40vw; value="<?php if (isset($_POST['marque'])) echo htmlspecialchars($_POST['marque']);?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Prix"><p>Prix</p></label>
                    </td>
                    <td>
                        <input  type="number" name="prix" required="required" style="width: 40vw; value="<?php if (isset($_POST['prix'])) echo htmlspecialchars($_POST['prix']);?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Quantite"><p>Quantite</p></label>
                    </td>
                    <td>
                        <input  type="number" name="quantite" required="required" style="width: 40vw; value="<?php if (isset($_POST['quantite'])) echo htmlspecialchars($_POST['quantite']);?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Roue"><p>Taille roue</p></label>
                    </td>
                    <td>
                        <input  type="number" name="roue" required="required" style="width: 40vw; value="<?php if (isset($_POST['roue'])) echo htmlspecialchars($_POST['roue']);?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="genre"><p>Choisir le genre du vélo</p></label>
                    </td>
                    <td>
                        <select name="genre"  required="required" id="genre-select">
                            <option value="">--Merci de sélectionner une option--</option>
                            <?php
                            if(!empty($genre)){
                                foreach ($genre as $g){
                                    ?>
                                    <option value=<?php echo "{$g->getIdGenre()}"?>><?php echo "{$g->getName()}"?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="type"><p>Choisir le type du vélo</p></label>
                    </td>
                    <td>
                        <select name="type" required="required" id="type-select">
                            <option value="">--Merci de sélectionner une option--</option>
                            <?php

                            if(!empty($types)){
                                foreach ($types as $t){
                                    ?>
                                    <option value=<?php echo "{$t->getIdType()}"?>><?php echo "{$t->getName()}"?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Neuf"><p>Neuf</p></label>
                    </td>
                    <td>
                        <input  type="checkbox" name="neuf" style="width: 40vw; value="<?php if (isset($_POST['neuf'])) echo htmlspecialchars($_POST['neuf']);?>">

                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Electrique"><p>Electrique</p></label>
                    </td>
                    <td>
                        <input  type="checkbox" name="electrique" style="width: 40vw; value="<?php if (isset($_POST['electrique'])) echo htmlspecialchars($_POST['electrique']);?>">

                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Pliant"><p>Pliant</p></label>
                    </td>
                    <td>
                        <input  type="checkbox" name="pliant" style="width: 40vw; value="<?php if (isset($_POST['pliant'])) echo htmlspecialchars($_POST['pliant']);?>">

                    </td>
                </tr>
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
