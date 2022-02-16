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
        <table style="height: 80%; width: 80%">
            <tr style="height: 50%; width: 100%">
                <td style="height: 100%; width: 50%; text-align: center;">
                    <img src="<?= $origine.".mvc/.files/img/profil/baseUser.png" ?>" class="photoProfilPage"/>
                </td>
                <td style="height: 100%; width: 50%">
                    <div class="corpArticleProfilPage">
                        <h3>Information : </h3>
                        <p>
                            <br/>Nom : <?= $nom ?>
                            <br/>Prénom : <?= $prenom ?>
                            <br/>
                            <br/>Adresse : <?= $cp ?>, <?= $ville ?>
                        </p>
                    </div>
                </td>
            </tr>
            <tr style="height: 50%; width: 100%">
                <td style="height: 100%; width: 50%">
                    <div class="corpArticleProfilPage">
                        <h3>Contact : </h3>
                        <p>
                            <br/>Mail : <?= $mail ?>
                        </p>
                    </div>
                </td>
                <td style="height: 100%; width: 50%">
                    <div class="corpArticleProfilPage">
                        <?php

                        if ($_SESSION['user'] == $user->getIdCompte()){
                            echo "<a href=".$origine.'comptes/modifier_profil'."><button>Modifer votre profil</button></a>";
                        }
                        elseif ($_SESSION['admin']){
                            echo "<a href='".$origine.".mvc/controller/deleteUser.php?id=".$user->getIdCompte()."'><button>Supprimer l'utilisateur</button></a>";
                        }

                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
<?php /* Page en HTML ↑ */
$content = ob_get_clean();

include $origine.".mvc/view/include_require/template.php";
?>