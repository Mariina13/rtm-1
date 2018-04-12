<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FluxSortantSivRepository")
 */
class FluxSortantSiv
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id",type="integer")
     */
    private $id;

    /**
    * @ORM\Column(name ="date_envoi_borne", type="datetime")
    */
    private $dateEnvoiBorne;
    /**
    * @ORM\Column(name ="id_borne", type="integer", length=200)
    */
    private $idBorne;
    /**
    * @ORM\Column(name ="id_ligne", type="integer", length=200)
    */
    private $idLigne;
    /**
    * @ORM\Column(name ="id_destination", type="integer", length= 200)
    */
    private $idDestination;
    /**
    * @ORM\Column(name ="id_vj", type="integer", length=200)
    */
    private $idVj;
    /**
    * @ORM\Column(name ="org", type="integer", length=200)
    */
    private $org;
    /**
    * @ORM\Column(name ="horaire", type="integer", length=200)
    */
    private $horaire;
    /**
     * @ORM\Column(name ="delta_borne", type="integer", length=200)
     */
    private $deltaBorne;
    /**
     * @ORM\Column(name ="delta_reel", type="integer", length=200)
     */
    private $deltaReel;
    /**
     * @ORM\Column(name ="fleche", type="integer", length=200)
     */
    private $fleche;
    

    //GETTER 

    public function getId ()
    {
         return $this->id;
    }
     public function getdateEnvoiBorne ($format)
    {
        return $this->dateEnvoiBorne->format($format);
    }
    public function getIdBorne ()
    {
        return $this->idBorne;
    }
    public function getidLigne()
    {
        return $this->idLigne;
    }
    public function getIdDestination ()
    {
        return $this->idDestination;
    }
    public function getIdVj()
    {
        return $this->idVj;
    }
    public function getHoraire()
    {
        return $this->horaire;
    }
    public function getDeltaBorne()
    {
        return $this->deltaBorne;
    }
    public function getDeltaReel()
    {
        return $this->deltaReel;
    }
    public function getFleche()
    {
        return $this->fleche;
    }
}
