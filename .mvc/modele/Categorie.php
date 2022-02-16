<?php

class Categorie
{
    private int $idCatégorie;
    private string $nom;

    /**
     * @param int $idCatégorie
     * @param string $nom
     */
    public function __construct(int $idCatégorie, string $nom)
    {
        $this->idCatégorie = $idCatégorie;
        $this->nom = $nom;
    }

    /**
     * @return int
     */
    public function getIdCategorie(): int
    {
        return $this->idCatégorie;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }
}

function getCategories():array{
    $db=open();
    $selectComptesStatement=$db->prepare('SELECT * FROM categorie');
    $selectComptesStatement->execute();
    $comptes=$selectComptesStatement->fetchAll();
    $tab=[];
    foreach ($comptes as $c){
        $categorie = new Categorie($c['idcategorie'], $c['nom']);
        $tab[]=$categorie;

    }
    close($db);
    return $tab;
}

function getCategorie($idCategorie):Categorie{
    $db=open();
    $selectCompteStatement=$db->prepare('SELECT * FROM categorie WHERE idcategorie = :id;');
    $selectCompteStatement->execute([
        'id' => $idCategorie,
    ]);
    if($selectCompteStatement->rowCount()==1){
        $c = $selectCompteStatement->fetch();
        $categorie = new Categorie($c['idcategorie'], $c['nom']);
    }
    close($db);
    return $categorie;

}