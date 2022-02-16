<?php
$dev = "Guillier";

$title = "";
$comment = ""; // Optional

ob_start();
/* Page en HTML ↓ */
if (!empty($reparation) && !empty($compte)) {
    ?>

    <header>
        <h1><?php echo "{$reparation->getTitre()}"?></h1>
        <p>
            <br/><br/>
            <span style="font-size: x-large">
            </span>
        </p>
    </header>

    <object> <!--Description-->
        <h4>Description :</h4>
        <p>
            <?php echo "{$reparation->getDescription()}"?>
        </p>
        <h4>Catégories :</h4>
        <p>
            <?php
            foreach ($categories as $c) {
                echo "-{$c->getNom()} <br>";
            }
            ?>
        </p>
    </object>
    <object>
    </object>
    <object> <!--Localisation-->
        <h4>Localisation :</h4>
        <p>
            <iframe width="600" height="450" style="border:0" loading="lazy" allowfullscreen src=<?php echo "https://www.google.com/maps/embed/v1/place?q={$compte->getVille()}&key=AIzaSyDE9r7eSVfHz1uAin1513MZ6PXvB35R0Dw"?>></iframe>
        </p>
    </object>


    <form name="contact_form" method="post" action="" style="font-size: 1vw">
        <label for="commentaire"><p>Commentaire *</p></label>
        <textarea  name="commentaire" style="width: 40vw; font-size: 2vw"></textarea>
        <input type="submit" value=" Envoyer " style="width: 15vw">
    </form>
    <?php
    if(isset($_POST['valider'])) {
        $email_to = $reparation->getCompte()->getMail();
        $email_subject = "Contact via ".$reparation->getTitre();

        // create email headers
        $headers = 'From: lassainora@lassainora.fr\r\n'.
            'Reply-To: lassainora@lassainora.fr\r\n' .
            'X-Mailer: PHP/' . phpversion();
        mail($email_to, $email_subject, $_POST['commentaire'], $headers);
    }
    ?>

    <?php

    if ($_SESSION['admin']){
        echo "<a href='".$origine.".mvc/controller/deleteReparation.php?id=".$reparation->getIdReparation()."'><button>Supprimer le service</button></a>";
    }

    ?>
    <?php /* Page en HTML ↑ */
}
$content = ob_get_clean();

include $origine.".mvc/view/include_require/template.php";
?>