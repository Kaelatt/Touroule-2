<?php
require ("Categorie.php");


class Reparation{
    private $idReparation;
    private $compte;
    private $titre;
    private $description;
    private $categories;

    /**
     * @param $idReparation
     * @param $compte
     * @param $titre
     * @param $description
     * @param $categories
     */
    public function __construct($idReparation, $compte, $titre, $description, $categories)
    {
        $this->idReparation = $idReparation;
        $this->compte = $compte;
        $this->titre = $titre;
        $this->description = $description;
        $this->categories=$categories;
    }

    /**
     * @return mixed
     */
    public function getIdReparation()
    {
        return $this->idReparation;
    }

    /**
     * @return mixed
     */
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param mixed $categories
     */
    public function setCategories($categories): void
    {
        $this->categories = $categories;
    }


}

function supprimerReparation($id){
    $db=open();
    $sql = $db->prepare("DELETE FROM Reperation WHERE idReparation = :id;");
    $sql->execute([
        'id' => $id
    ]);
    close($db);
}

function getReparation():array{
    $db=open();
    $selectReparationsStatement=$db->prepare('SELECT * FROM Reparation;');
    $selectReparationsStatement->execute();
    $reparations=$selectReparationsStatement->fetchAll();
    $tab=[];
    foreach ($reparations as $r){
        $categories=[];
        $selectCatStatement=$db->prepare('SELECT * FROM cat WHERE idreparation= :idrep;');
        $selectCatStatement->execute([
            'idrep' => $r['idreparation'],
        ]);
        $cats=$selectCatStatement->fetchAll();
        foreach ($cats as $c){

            $categories[]=getCategorie($c['idcategorie']);
        }
        $reparation = new Reparation($r['idreparation'],$r['idcompte'],$r['titre'],$r['decription'],$categories);
        $tab[]=$reparation;

    }
    close($db);
    return $tab;
}
function creerReparation(Reparation $reparation){
    $db=open();
    $sql = $db->prepare("INSERT INTO reparation(idcompte, titre, decription) VALUES (:idcompte, :titre, :description)  RETURNING idreparation");

    $sql->execute([
        'idcompte' => $reparation->getCompte(),
        'titre' => $reparation->getTitre(),
        'description' => $reparation->getDescription()
    ]);
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    foreach ($reparation->getCategories() as $c) {
        $sql = $db->prepare("INSERT INTO cat(idreparation, idcategorie) VALUES (:idreparation, :idcategorie) ");
        $sql->execute([
            'idreparation' => $result["idreparation"],
            'idcategorie' => $c->getIdCategorie,
        ]);
    }
    close($db);
    return $result["idreparation"];

}


function getReparationid($id){
    $db=open();
    $selectReparationsStatement=$db->prepare('SELECT * FROM Reparation WHERE idReparation= :id;');
    $selectReparationsStatement->execute([
        ':id' => $id
    ]);
    $result=null;
    if($selectReparationsStatement->rowCount()==1){
        $r=$selectReparationsStatement->fetch();
        $categories=[];
        $selectCatStatement=$db->prepare('SELECT * FROM cat WHERE idreparation= :idrep;');
        $selectCatStatement->execute([
            'idrep' => $id,
        ]);
        $cats=$selectCatStatement->fetchAll();
        foreach ($cats as $c){

            $categories[]=getCategorie($c['idcategorie']);
        }
        $reparation = new Reparation($r['idreparation'],$r['idcompte'],$r['titre'],$r['decription'],$categories);
        $result=$reparation;

    }
    close($db);
    return $result;
}