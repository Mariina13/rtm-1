<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParametrageBornesRepository")
 */
class ParametrageBornes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
    * @ORM\Column(name ="id_stations", type="integer", length=200)
    */
    private $idStations;
    /**
    * @ORM\Column(name ="version", type="integer", length=200)
    */
    private $version;
    /**
    * @ORM\Column(name ="seuilApprocheVehicule", type="integer", length=200)
    */
    private $seuilApprocheVehicule;
    /**
    * @ORM\Column(name ="modeAffRuptureCom", type="integer", length=200)
    */
    private $modeAffRuptureCom;
      /**
    * @ORM\Column(name ="seuilDetRuptureCom", type="integer", length=200)
    */
    private $seuilDetRuptureCom;
      /**
    * @ORM\Column(name ="modeDeFonctionnement", type="integer", length=200)
    */
    private $modeDeFonctionnement;
      /**
    * @ORM\Column(name ="seuilDeMaintien", type="integer", length=200)
    */
    private $seuilDeMaintien;
      /**
    * @ORM\Column(name ="texteProxVehicule", type="string", length=255)
    */
    private $texteProxVehicule;
      /**
    * @ORM\Column(name ="envoye", type="integer", length=200)
    */
    private $envoye;



    //GETTER

    public function getId()
    {
        return $this->id;
    }
    public function getIdStations()
    {
        return $this->idStations;
    }
    public function getVersion()
    {
        return $this->version;
    }
    public function getSeuilApprocheVehicule()
    {
        return $this->seuilApprocheVehicule;
    }
    public function getModeAffRuptureCom()
    {
        return $this->modeAffRuptureCom;
    }
    public function getSeuilDetRuptureCom()
    {
        return $this->seuilDetRuptureCom;
    }
    public function getModeDeFonctionnement()
    {
        return $this->modeDeFonctionnement;
    }
    public function getSeuilDeMaintien()
    {
        return $this->seuilDeMaintien;
    }
    public function getTexteProxVehicule()
    {
        return $this->texteProxVehicule;
    }
    public function getEnvoye()
    {
        return $this->envoye;
    }
}
