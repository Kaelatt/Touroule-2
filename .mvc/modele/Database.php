<?php

class Type{
    private int $idType;
    private String $name;

    /**
     * @param int $idType
     * @param String $name
     */
    public function __construct(int $idType, string $name)
    {
        $this->idType = $idType;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getIdType(): int
    {
        return $this->idType;
    }

    /**
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }
}

class Genre{
    private int $idGenre;
    private String $name;

    /**
     * @param int $idGenre
     * @param String $name
     */
    public function __construct(int $idGenre, string $name)
    {
        $this->idGenre = $idGenre;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getIdGenre(): int
    {
        return $this->idGenre;
    }

    /**
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }
}


function open(){
    $namehost = "";
    $port = "";
    $dbname = "";
    $login = "";
    $password = "";

    try {
        $db = new PDO("pgsql:host={$namehost};port={$port};dbname={$dbname}"
            , $login, $password
        );
        return $db;
    }catch (Exception $e){
        die("Erreur : " . $e->getMessage());
    }
}



function getTypeList():array{
    $db=open();
    $statement=$db->prepare('SELECT * FROM type;');
    $statement->execute();
    $objet=$statement->fetchAll();
    foreach ($objet as $o){
        $tab[]=new Type($o['idtype'],$o['nom']);
    }
    close($db);
    return $tab;
}
function getGenre():array{
    $db=open();
    $statement=$db->prepare('SELECT * FROM Genre;');
    $statement->execute();
    $objet=$statement->fetchAll();

    foreach ($objet as $o){
        $tab[]=new Genre($o['idgenre'],$o['nom']);
    }
    close($db);
    return $tab;
}

function getGenreid($id){
    $db=open();
    $selectCompteStatement=$db->prepare('SELECT * FROM Genre WHERE idgenre = :idgenre;');
    $selectCompteStatement->execute([
        'idgenre' => $id,
    ]);
    $genre=null;
    if($selectCompteStatement->rowCount()==1){
        $g = $selectCompteStatement->fetch();
        $genre = new Genre($g['idgenre'],$g['nom']);
    }
    close($db);
    return $genre;
}

function getTypeid($id){
    $db=open();
    $selectCompteStatement=$db->prepare('SELECT * FROM Type WHERE idtype = :idtype;');
    $selectCompteStatement->execute([
        'idtype' => $id,
    ]);
    $type=null;
    if($selectCompteStatement->rowCount()==1){
        $t = $selectCompteStatement->fetch();
        $type = new Type($t['idtype'],$t['nom']);
    }
    close($db);
    return $type;
}


function close(&$db){
    $db=null;
}