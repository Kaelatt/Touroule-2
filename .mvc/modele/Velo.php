<?php
class Velo{
    private int $idVelo;
    private int $idCompte;
    private int $idtype;
    private int $idgenre;
    private string $marque;
    private float $tailleRoue;
    private int $electrique;
    private int $pliant;
    private float $prix;
    private int $neuf;
    private int $quantite;
    private string $titre;
    private string $description;

    /**
     * @param $idVelo
     * @param $idcompte
     * @param $idtype
     * @param $idGenre
     * @param $marque
     * @param $tailleRoue
     * @param $electrique
     * @param $pliant
     * @param $prix
     * @param $neuf
     * @param $quantite
     * @param $titre
     * @param $description
     */

    public function __construct($idVelo, $idCompte, $idtype, $idgenre, $marque, $tailleRoue, $electrique, $pliant, $prix, $neuf, $quantite, $titre, $description)
    {
        $this->idVelo = $idVelo;
        $this->idCompte = $idCompte;
        $this->idtype = $idtype;
        $this->idgenre = $idgenre;
        $this->marque = $marque;
        $this->tailleRoue = $tailleRoue;
        $this->electrique = $electrique;
        $this->pliant = $pliant;
        $this->prix = $prix;
        $this->neuf = $neuf;
        $this->quantite = $quantite;
        $this->titre = $titre;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getIdVelo(): int
    {
        return $this->idVelo;
    }

    /**
     * @return mixed
     */
    public function getIdCompte(): int
    {
        return $this->idCompte;
    }

    /**
     * @return int
     */
    public function getIdtype(): int
    {
        return $this->idtype;
    }

    /**
     * @return int
     */
    public function getIdgenre(): int
    {
        return $this->idgenre;
    }



    /**
     * @return mixed
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @return mixed
     */
    public function getTailleRoue()
    {
        return $this->tailleRoue;
    }

    /**
     * @return mixed
     */
    public function getElectrique() :int
    {
        return $this->electrique;
    }

    /**
     * @return mixed
     */
    public function getPliant() :int
    {
        return $this->pliant;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @return mixed
     */
    public function getNeuf() :int
    {
        return $this->neuf;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
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

}

function getVelos():array{
    $db=open();

    $selectVelpsStatement=$db->prepare('SELECT idVelo, idCompte, idtype, idgenre, marque, taille_roue, electrique, pliant, prix, neuf, quantite, titre, description, t.nom as type, g.nom as genre FROM velo join Type as t using (idType) join Genre as g using (idGenre);');
    $selectVelpsStatement->execute();
    $velos=$selectVelpsStatement->fetchAll();

    foreach ($velos as $v){
        $velo = new Velo($v['idvelo'],$v['idcompte'],$v['idtype'],$v['idgenre'],$v['marque'],$v['taille_roue'],$v['electrique'],$v['pliant'],$v['prix'],$v['neuf'],$v['quantite'],$v['titre'],$v['description']);
        $tab[]=$velo;

    }
    close($db);
    return $tab;
}



function supprimerVelo($id){
    $db=open();
    $sql = $db->prepare("DELETE FROM velo WHERE idVelo = :id;");
    $sql->execute([
        'id' => $id
    ]);
    close($db);
}

function getVelo($id){
    $db=open();
    $selectCompteStatement=$db->prepare('SELECT * FROM velo WHERE idvelo = :idvelo;');
    $selectCompteStatement->execute([
        'idvelo' => $id,
    ]);
    $velo=null;
    if($selectCompteStatement->rowCount()==1){
        $v = $selectCompteStatement->fetch();
        $velo = new Velo($v['idvelo'],$v['idcompte'],$v['idtype'],$v['idgenre'],$v['marque'],$v['taille_roue'],$v['electrique'],$v['pliant'],$v['prix'],$v['neuf'],$v['quantite'],$v['titre'],$v['description']);
    }
    close($db);
    return $velo;
}


function creerVelo(Velo $velo){
    $db=open();
    $sql = $db->prepare("INSERT INTO velo(idcompte, idtype, idgenre, marque, taille_roue, electrique, pliant, prix, neuf, quantite, titre, description) VALUES (:idcompte, :idtype, :idgenre, :marque, :taille_roue, :electrique, :pliant, :prix, :neuf, :quantite, :titre, :description)  RETURNING idvelo");

    $sql->execute([
        'idcompte' => $velo->getIdCompte(),
        'idtype' => $velo->getIdtype(),
        'idgenre' => $velo->getIdgenre(),
        'marque' => $velo->getMarque(),
        'taille_roue' => $velo->getTailleRoue(),
        'electrique' => $velo->getElectrique(),
        'pliant' => $velo->getPliant(),
        'prix' => $velo->getPrix(),
        'neuf' => $velo->getNeuf(),
        'quantite' => $velo->getQuantite(),
        'titre' => $velo->getTitre(),
        'description' => $velo->getDescription()
        ]);
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    close($db);
    return $result["idvelo"];

}
