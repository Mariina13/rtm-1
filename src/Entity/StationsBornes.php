<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StationsBornesRepository")
 */
class StationsBornes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_stations", type="integer")
     */
    private $idStations;
    /**
    * @ORM\Column(name ="id_bornes", type="integer", length=200)
    */
    private $idBornes;

    //GETTER

    public function getIdStations()
    {
        return $this->idStations;
    }
    public function getIdBornes()
    {
        return $this->idBornes;
    }
    
}
