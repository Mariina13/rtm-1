<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StationsRepository")
 */
class Stations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id",type="integer")
     */
    private $id;
    /**
    * @ORM\Column(name ="sigep", type="integer", length=200)
    */
    private $sigep;
    /**
    * @ORM\Column(name ="nomPtReseau", type="string", length=200)
    */
    private $nomPtReseau;
    /**
    * @ORM\Column(name ="lignesCommercialesStation", type="string", length=200)
    */
    private $lignesCommercialesStations;
    /**
    * @ORM\Column(name ="sens", type="string", length=200)
    */
    private $sens;
    /**
    * @ORM\Column(name ="type", type="integer", length=200)
    */
    private $type;

    //SETTER

    public function setNomPtReseau($nomPtReseau)
    {
        return $this->nomPtReseau = $nomPtReseau;
    }

    //GETTER

    public function getId()
    {
        return $this->id;
    }
    public function getSigep()
    {
        return $this->sigep;
    }
    public function getNomPtReseau()
    {
        return $this->nomPtReseau;
    }
    public function getLignesCommercialesStations()
    {
        return $this->lignesCommercialesStations;
    }
    public function getSens()
    {
        return $this->sens;
    }
    public function getType()
    {
        return $this->type;
    }
}
