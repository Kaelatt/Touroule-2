<?php
$dev = "Lassa";

$title = "";
$comment = ""; // Optional

ob_start();
/* Page en HTML ↓ */?>
    <header>
        <h1>Contacts</h1>
        <p>
            <br/><br/>
        </p>
    </header>

    <div class="article" role="article">
        <div class="corpArticle" id="Sous-Titre_2">
            <h2>L'équipe</h2>

            <div class="sousCorpArticle" id="Sous-sous-titre_1">
                <table style="width: 100%">
                    <tr style="width: 100%">
                        <td style="text-align: center;width: 20%">
                            <a href="Viandier">
                                <h6>Benjamin VIANDIER CHOCHOIS</h6>
                                <img src="<?= $origine.".mvc/.files/img/profil/Viandier.png" ?>" width="100em">
                            </a>
                        </td>
                        <td style="text-align: center;width: 20%">
                            <a href="Frappat">
                                <h6>Mathéo FRAPPAT</h6>
                                <img src="<?= $origine.".mvc/.files/img/profil/Frappat.png" ?>" width="100em">
                            </a>
                        </td>
                        <td style="text-align: center;width: 20%">
                            <a href="Thiery">
                                <h6>Corentin THIERY</h6>
                                <img src="<?= $origine.".mvc/.files/img/profil/Thiery.png" ?>" width="100em">
                            </a>
                        </td>
                        <td style="text-align: center;width: 20%">
                            <a href="Braik">
                                <h6>Sofiane BRAIK</h6>
                                <img src="<?= $origine.".mvc/.files/img/profil/Braik.png" ?>" width="100em">
                            </a>
                        </td>
                        <td style="text-align: center;width: 20%">
                            <a href="Guillier">
                                <h6>Camille GUILLIER</h6>
                                <img src="<?= $origine.".mvc/.files/img/profil/Guillier.png" ?>" width="100em">
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="corpArticle" id="Sous-Titre_2">
            <h2>Formulaire de contact:</h2>
            <p>
            <form name="contact_form" method="post" action="" style="font-size: 1vw">
                <table  style="width: max-content">
                    <tr>
                        <td>
                            <label for="nom"><p>Nom *</p></label>
                        </td>
                        <td>
                            <input  type="text" name="nom" style="width: 40vw; font-size: 2vw" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="prenom"><p>Prénom *</p></label>
                        </td>
                        <td>
                            <input  type="text" name="prenom"  style="width: 40vw; font-size: 2vw" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email"><p>Email Addresse *</p></label>
                        </td>
                        <td>
                            <input  type="text" name="email" style="width: 40vw; font-size: 2vw" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="telephone"><p>Téléphone</p></label>
                        </td>
                        <td>
                            <input  type="text" name="telephone" style="width: 40vw; font-size: 2vw" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="commentaire"><p>Commentaire *</p></label>
                        </td>
                        <td>
                            <textarea  name="commentaire" style="width: 40vw; font-size: 2vw"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center">
                            <input type="submit" value="valider" style="width: 15vw">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
            if(isset($_POST['valider'])) {

                // EDIT THE 2 LINES BELOW AS REQUIRED
                $email_to = "lassainora@lassainora.fr";
                $email_subject = "Contact via https://touroule.lassainora.fr/contacts";

                function died($error) {
                    // your error code can go here
                    echo
                        "Nous sommes désolés, mais des erreurs ont été détectées dans le" .
                        " formulaire que vous avez envoyé. ";
                    echo "Ces erreurs apparaissent ci-dessous.<br /><br />";
                    echo $error."<br /><br />";
                    echo "Merci de corriger ces erreurs.<br /><br />";
                    die();
                }


                // si la validation des données attendues existe
                if(!isset($_POST['nom']) ||
                    !isset($_POST['prenom']) ||
                    !isset($_POST['email']) ||
                    !isset($_POST['telephone']) ||
                    !isset($_POST['commentaire'])) {
                    died(
                        'Nous sommes désolés, mais le formulaire que vous avez soumis semble poser' .
                        ' problème.');
                }



                $nom = $_POST['nom']; // required
                $prenom = $_POST['prenom']; // required
                $email = $_POST['email']; // required
                $telephone = $_POST['telephone']; // not required
                $commentaire = $_POST['commentaire']; // required

                $error_message = "";
                $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

                if(!preg_match($email_exp,$email)) {
                    $error_message .=
                        'L\'adresse e-mail que vous avez entrée ne semble pas être valide.<br />';
                }

                // Prend les caractères alphanumériques + le point et le tiret 6
                $string_exp = "/^[A-Za-z0-9 .'-]+$/";

                if(!preg_match($string_exp,$nom)) {
                    $error_message .=
                        'Le nom que vous avez entré ne semble pas être valide.<br />';
                }

                if(!preg_match($string_exp,$prenom)) {
                    $error_message .=
                        'Le prénom que vous avez entré ne semble pas être valide.<br />';
                }

                if(strlen($commentaire) < 2) {
                    $error_message .=
                        'Le commentaire que vous avez entré ne semble pas être valide.<br />';
                }

                if(strlen($error_message) > 0) {
                    died($error_message);
                }

                $email_message = "Details: \n";
                $email_message .= "\tNom: ".$nom."\n";
                $email_message .= "\tPrenom: ".$prenom."\n";
                $email_message .= "\tEmail: ".$email."\n";
                $email_message .= "\tTelephone: ".$telephone."\n";
                $email_message .= "\tCommentaire: ".$commentaire."\n";

                // create email headers
                $headers = 'From: '.$email."\r\n".
                    'Reply-To: '.$email."\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                mail($email_to, $email_subject, $email_message, $headers);
                ?>

                <p>Merci de nous avoir contacter. Nous vous contacterons très bientôt.</p>

            <?php } ?>
            </p>
        </div>
    </div>
<?php /* Page en HTML ↑ */
$content = ob_get_clean();

include $origine.".mvc/view/include_require/template.php";
?>