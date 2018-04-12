<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FluxEntrantSivRepository")
 */
class FluxEntrantSiv
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
    * @ORM\Column(name ="heure_reception", type="datetime")
    */
    private $heureReception;
    /**
    * @ORM\Column(name ="ptReseau", type="integer", length=200)
    */
    private $ptReseau;
    /**
    * @ORM\Column(name ="ligneCial", type="integer", length=200)
    */
    private $ligneCial;
    /**
    * @ORM\Column(name ="heure_passage_reel", type="datetime")
    */
    private $heurePassageReel;
    /**
    * @ORM\Column(name ="course", type="string", length=200)
    */
    private $Course;
    /**
     * @ORM\Column(name ="passage_reel", type="string", length=200)
     */
    private $passageReel;
    /**
     * @ORM\Column(name ="destination_code", type="integer", length=200)
     */
    private $destinationCode;
    /**
     * @ORM\Column(name ="destination", type="string", length=200)
     */
    private $destination;


    //GETTER 

    public function getId ()
    {
         return $this->id;
    }
     public function getHeureReception ()
    {
        return $this->heureReception->format($format);
    }
    public function getptReseau ()
    {
        return $this->ptReseau;
    }
    public function getligneCial()
    {
        return $this->ligneCial;
    }
    public function getHeurePassageReel ($format)
    {
        return $this->heurePassageReel->format($format);
    }
    public function getCourse()
    {
        return $this->course;
    }
    public function getPassageReel()
    {
        return $this->passageReel;
    }
    public function getDestinationCode()
    {
        return $this->destinationCode;
    }
    public function getDestination()
    {
        return $this->destination;
    }
}
