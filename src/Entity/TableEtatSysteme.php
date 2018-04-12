<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TableEtatSystemeRepository")
 */
class TableEtatSysteme
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id",type="integer")
     */
    private $id;

    /**
    * @ORM\Column(name ="siv", type="string", length=200)
    */
   private $siv;
   /**
    * @ORM\Column(name ="switch_tetra", type="string", length=200)
    */
    private $switchTetra;
    /**
    * @ORM\Column(name ="spoti2", type="string", length=200)
    */
   private $spoti2;
   /**
    * @ORM\Column(name ="base_de_donnees", type="string", length=200)
    */
    private $baseDeDonnees;

    //SETTER

    public function setId ($id)
    {
        $this->id = $id;
    }
     public function setSiv ($siv)
    {
        $this->siv = $siv;
    }
    
    public function setSwitchTetra ($switchTetra)
    {
        $this->switch_tetra = $switchTetra;
    }

    public function setSpoti2 ($spoti2)
    {
        $this->spoti2 = $spoti2;
    }
    public function setBaseDeDonnees ($basededonnees)
    {
        $this->base_de_donnees = $bseDeDonnees;
    }
    


   //GETTER

   public function getId()
   {
       return $this->id;
   }
   public function getSiv()
   {
       return $this->siv;
   }
   public function getSwitchTetra()
   {
       return $this->switchTetra;
   }
   public function getSpoti2()
   {
       return $this->spoti2;
   }
   public function getBaseDeDonnees()
   {
        return $this->baseDeDonnees;
   }
}
