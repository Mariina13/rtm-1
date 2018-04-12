<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LignesStationsRepository")
 */
class LignesStations
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id_lignes" , type="integer")
    */
    private $idLignes;
    
    /**
    * @ORM\Column(name ="id_stations", type="integer", length=200)
    */
     private $idStations;

     // GETTER

     public function getIdLignes()
     {
         return $this->idLignes;
     }

     public function getIdStations()
     {
         return $this->idStations;
     }
}
