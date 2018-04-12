<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StationsDestinationsRepository")
 */
class StationsDestinations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
      * @ORM\Column(name="id_stations", type="integer")
     */
    private $idStations;
    /**
    * @ORM\Column(name ="id_stations_destination", type="integer", length=200)
    */
    private $idStationsDestination;

    //GETTER

    public function getIdStations()
    {
        return $this->idStations;
    }
    public function getIdStationsDestination()
    {
        return $this->idStationsDestination;
    }
}
