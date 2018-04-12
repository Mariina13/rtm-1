<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LignesCommercialesRepository")
 */
class LignesCommerciales
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id",type="integer")
     */
    private $id;

    /**
    * @ORM\Column(name ="nomLigneCial", type="string", length=200)
    */
    private $nomLigneCial;
    /**
    * @ORM\Column(name ="type", type="integer", length=200)
    */
    private $type;

    // GETTER

    public function getId ()
    {
         return $this->id;
    }
     public function getNomLigneCial ()
    {
        return $this->nomLigneCial;
    }
    public function getType ()
    {
        return $this->type;
    }
}
