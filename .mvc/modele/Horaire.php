<?php

class Horaire{
    private $idhoraire;
    private $compte;
    private $jour;
    private $debuth;
    private $debutm;
    private $finh;
    private $finm;

    /**
     * @param $idhoraire
     * @param $compte
     * @param $jour
     * @param $debuth
     * @param $debutm
     * @param $finh
     * @param $finm
     */
    public function __construct($idhoraire, $compte, $jour, $debuth, $debutm, $finh, $finm)
    {
        $this->idhoraire = $idhoraire;
        $this->compte = $compte;
        $this->jour = $jour;
        $this->debuth = $debuth;
        $this->debutm = $debutm;
        $this->finh = $finh;
        $this->finm = $finm;
    }

    /**
     * @return mixed
     */
    public function getIdhoraire()
    {
        return $this->idhoraire;
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
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * @return mixed
     */
    public function getDebuth()
    {
        return $this->debuth;
    }

    /**
     * @return mixed
     */
    public function getDebutm()
    {
        return $this->debutm;
    }

    /**
     * @return mixed
     */
    public function getFinh()
    {
        return $this->finh;
    }

    /**
     * @return mixed
     */
    public function getFinm()
    {
        return $this->finm;
    }




}