<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BornesRepository")
 */
class Bornes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    private $id;
    /**
     * @ORM\Column(name ="sigep", type="integer", length=200)
     */
    private $sigep;
    /**
     * @ORM\Column(name ="type", type="integer", length=200)
     */
    private $type;
    /**
     * @ORM\Column(name ="type_equipement", type="integer",length=200)
     */
    private $typeEquipement;
    /**
     * @ORM\Column(name ="adresse_equipement", type="integer",length=200)
     */
    private $adresseEquipement;
     /**
     * @ORM\Column(name ="numero_interne", type="integer",length=200)
     */
    private $numeroInterne;
     /**
     * @ORM\Column(name ="sigep_virtuel", type="integer",length=200)
     */
    private $sigepVirtuel;
     /**
     * @ORM\Column(name ="quai_defaut", type="integer",length=200)
     */
    private $quaiDefaut;
     /**
     * @ORM\Column(name ="connexion", type="integer",length=200)
     */
    private $connexion;
     /**
     * @ORM\Column(name ="data_spoti", type="string",length=200)
     */
    private $dataSpoti;
     /**
     * @ORM\Column(name ="ref_version_table", type="string",length=200)
     */
    private $refVersionTable;
     /**
     * @ORM\Column(name ="data_siv_sent", type="string",length=200)
     */
    private $dataSivSent;

    //SETTER
    public function setId($id)
    {
        return $this->id = $id;
    }
    public function setSigep($Sigep)
    {
        return $this->sigep = $sigep;
    }
    public function setType($type)
    {
        return $this->type = $type;
    }
    public function setTypeEquipement($typeEquipement)
    {
        return $this->typeEquipement = $typeEquipement;
    }
    public function setAdresseEquipement($AdresseEquipement)
    {
        return $this->adresseEquipement = $AdresseEquipement;
    }
    public function setNumeroInterne ($numeroInterne)
    {
        return $this->numeroInterne ($numeroInterne);
    }
    public function setSigepVirtuel($sigepVirtuel)
    {
        return $this->sigepVirtuel = $sigepVirtuel;
    }
    public function setQuaiDefaut($quaidefaut)
    {
        return $this->quaiDefaut = $quaiDefaut;
    }
    public function setConnexion($connexion)
    {
        return $this->connexion = $connexion;
    }
    public function setDataSpoti($dataSpoti)
    {
        return $this->dataSpoti = $dataSpoti;
    }
    public function setRefVersionTable($refVersionTable)
    {
        return $this->refVersionTable = $refVersionTable;
        
    }
    public function setDataSivSent($dataSivSent)
    {
        return $this->dataSivSent = $dataSivSent;
    }
    // GETTER
    function getId ()
    {
        return $this->id;
    }
    function getSigep ()
    {
        return $this->sigep;
    }
    function getType ()
    {
        return $this->type;
    }
    function getTypeEquipement ()
    {
        return $this->typeEquipement;
    }
    function getAdresseEquipement ()
    {
        return $this->adresseEquipement;
    }
    function getNumeroInterne ()
    {
        return $this->numeroInterne;
    }
    function getSigepVirtuel ()
    {
        return $this->sigepVirtuel;
    }
    function getQuaiDefaut ()
    {
        return $this->quaiDefaut;
    }
    function getConnexion ()
    {
        return $this->connexion;
    }
    function getDataSpoti ()
    {
        return $this->dataSpoti;
    }
    function getRefVersionTable ()
    {
        return $this->refVersionTable;
    }
    function getDataSivSent ()
    {
        return $this->dataSivSent;
    }
    
}
