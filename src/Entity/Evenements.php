<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EvenementsRepository")
 */
class Evenements
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

     /**
     * @ORM\Column(name ="date", type="datetime")
     */
    private $date;
     /**
     * @ORM\Column(name ="module", type="string", length=200)
     */
    private $module;
     /**
     * @ORM\Column(name ="niveau", type="string", length=200)
     */
    private $niveau;
     /**
     * @ORM\Column(name ="type", type="string", length=200)
     */
    private $type;
     /**
     * @ORM\Column(name ="libelle", type="string", length=200)
     */
    private $libelle;

    // GETTER

    public function getId ()
    {
         return $this->id;
    }
     public function getDate ()
    {
         return $this->date->format($format);
    }
    public function getModule()
    {
         return $this->module;
    }
    public function getNiveau()
    {
         return $this->niveau;
    }
    public function getType()
    {
         return $this->type;
    }
    public function getLibelle()
    {
         return $this->libelle;
    }
}
