<?php
class Compte{
    private int $idCompte;
    private string $prenom;
    private string $nom;
    private string $password;
    private string $mail;
    private string $admin;
    private string $codepostal;
    private string $ville;

    /**
     * @param $idCompte
     * @param $prenom
     * @param $nom
     * @param $password
     * @param $mail
     * @param $admin
     * @param $codepostal
     * @param $cille
     */
    public function __construct($idCompte, $prenom, $nom, $password, $mail, $admin, $codepostal, $ville)
    {
        $this->idCompte = $idCompte;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->password = $password;
        $this->mail = $mail;
        $this->admin = $admin;
        $this->codepostal = $codepostal;
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getIdCompte()
    {
        return $this->idCompte;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @return mixed
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @param string $admin
     */
    public function setAdmin(string $admin): void
    {
        $this->admin = $admin;
    }

    /**
     * @param string $codepostal
     */
    public function setCodepostal(string $codepostal): void
    {
        $this->codepostal = $codepostal;
    }

    /**
     * @param string $ville
     */
    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

}

function getComptes():array{
    $db=open();
    $selectComptesStatement=$db->prepare('SELECT * FROM Compte');
    $selectComptesStatement->execute();
    $comptes=$selectComptesStatement->fetchAll();

    foreach ($comptes as $c){
        $compte = new Compte($c['idcompte'],$c['prenom'],$c['nom'],$c['password'],$c['mail'],$c['admin'],$c['codepostal'],$c['ville'],);
        $tab[]=$compte;

    }
    close($db);
    return $tab;
}

function getCompte($mail, $password){
    $db=open();
    $selectCompteStatement=$db->prepare('SELECT * FROM Compte WHERE mail = :mail and password = :password;');
    $selectCompteStatement->execute([
        'mail' => $mail,
        'password' => $password
    ]);
    $compte=null;
    if($selectCompteStatement->rowCount()==1){
        $c = $selectCompteStatement->fetch();
        $compte = new Compte($c['idcompte'], $c['prenom'], $c['nom'], $c['password'], $c['mail'], $c['admin'], $c['codepostal'], $c['ville'],);
    }
    close($db);
    return $compte;
}

function getCompteid($id){
    $db=open();
    $selectCompteStatement=$db->prepare('SELECT * FROM Compte WHERE idcompte = :idcompte;');
    $selectCompteStatement->execute([
        'idcompte' => $id
    ]);
    $compte=null;
    if($selectCompteStatement->rowCount()==1){
        $c = $selectCompteStatement->fetch();
        $compte = new Compte($c['idcompte'], $c['prenom'], $c['nom'], $c['password'], $c['mail'], $c['admin'], $c['codepostal'], $c['ville']);
    }
    close($db);
    return $compte;
}


function creerCompte($prenom, $nom, $password, $mail, $cp, $ville){
    $db=open();
        $sql = $db->prepare("INSERT INTO compte(prenom, nom, password, mail, codepostal, ville) VALUES (:prenom, :nom, :password, :mail, :cp, :ville);");

        $sql->execute([
            'prenom' => $prenom,
            'nom' => $nom,
            'password' => $password,
            'mail' => $mail,
            'cp' => $cp,
            'ville' => $ville]);
    close($db);
}

function supprimerCompte($id){
    $db=open();
    $sql = $db->prepare("DELETE FROM Compte WHERE idCompte = :id;");
    $sql->execute([
        'id' => $id
    ]);
    close($db);
}

function updateCompte(int $id, Compte $compte){
    $db=open();
    $sql = $db->prepare("UPDATE Compte set prenom = :prenom, nom=:nom,password=:pwd,mail=:mail,admin=:admin,codepostal=:cp,ville=:ville WHERE idcompte=:id;");
    $sql->execute([
        'prenom' => $compte->getPrenom(),
        'nom' => $compte->getNom(),
        'pwd' => $compte->getPassword(),
        'mail' => $compte->getMail(),
        'admin' => $compte->getAdmin(),
        'cp' => $compte->getCodepostal(),
        'ville' => $compte->getVille(),
        'id' =>   $id
    ]);
    close($db);
}