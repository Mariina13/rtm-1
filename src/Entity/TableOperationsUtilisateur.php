<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TableOperationsUtilisateurRepository")
 */
class TableOperationsUtilisateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    private $id;
    /**
    * @ORM\Column(name ="utilisateurs_id", type="integer",length = 200)
    */
    private $utilisateursId;

    /**
    * @ORM\Column(name ="date_operation", type="datetime")
    */
    private $dateOperation;
    /**
    * @ORM\Column(name ="operation", type="string" , length=200)
    */
    private $operation;
    /**
    * @ORM\Column(name ="sous_type_operation", type="string",length=200)
    */
    private $sousTypeOperation;
    /**
    * @ORM\Column(name ="id_stations", type="integer" , length=200)
    */
    private $idStations;
    /**
    * @ORM\Column(name ="date_acquittement_serveur", type="datetime")
    */
    private $dateAcquittementServeur;
    /**
    * @ORM\Column(name ="acquittement_serveur", type="string", length=200)
    */
    private $acquittementServeur;

    //SETTER
    public function setUtilisateursId($UtilisateursId)
    {
        return $this->utilisateursId = $utilisateursId;
    }
   
    // GETTER

    public function getId()
   {
       return $this->id;
   }
   public function getUtilisateursId()
   {
       return $this->utilisateursId;
   }
   public function getDateOperation($format)
   {
       return $this->dateOperation->format($format);
   }
   public function getOperation()
   {
       return $this->operation;
   }
   public function getSousTypeOperation()
   {
       return $this->sousTypeOperation;
   }
   public function getIdStations()
   {
        return $this->idStations;
   }

   public function getDateAcquittementServeur()
   {
       return $this->dateAcquittementServeur;
   }
   public function getAcquittementServeur()
   {
       return $this->acquittementServeur;
   }
}

