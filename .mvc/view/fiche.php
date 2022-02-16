<?php
$dev = "Lassa";

$title = "";
$comment = ""; // Optional

ob_start();
/* Page en HTML ↓ */?>
<header>
    <h1><?= $prenom ?> <?= $nom ?></h1>
    <p>
        <br/><br/>
    </p>
</header>

<div class="article" role="article">
    <table style="height: 100%; width: 100%">
        <tr style="height: 50%; width: 100%">
            <td style="height: 100%; width: 50%; text-align: center;">
                <img src="<?= $origine.".mvc/.files/img/profil/".$name.".png" ?>" class="photoProfilPage"/>
            </td>
            <td style="height: 100%; width: 50%">
                <div class="corpArticleProfilPage">
                    <h3>Information : </h3>
                    <p>
                        <br/>Nom : <?= $nom ?>
                        <br/>Prénom : <?= $prenom ?>
                        <br/>
                        <br/>Date de Naissance : <?= $dateNaissance ?>
                        <br/>Age : <?= $diff->format('%y') ?> ans
                    </p>
                </div>
            </td>
        </tr>
        <tr style="height: 50%; width: 100%">
            <td style="height: 100%; width: 50%">
                <div class="corpArticleProfilPage">
                    <h3>Contact : </h3>
                    <p>
                        <br/>Mail IUT : <a href="mailto:<?= $mail_iut ?>" target="_blank"><?= $mail_iut ?></a>
                        <br/>Github : <a href="<?= $github ?>" target="_blank"><?= $github ?></a>
                    </p>
                </div>
            </td>
            <td style="height: 100%; width: 50%">
                <div class="corpArticleProfilPage">
                    <h3>Rôle : </h3>
                    <p>
                        <?= $role ?>
                    </p>
                </div>
            </td>
        </tr>
    </table>
</div>
<?php /* Page en HTML ↑ */
$content = ob_get_clean();

include $origine.".mvc/view/include_require/template.php";
?>