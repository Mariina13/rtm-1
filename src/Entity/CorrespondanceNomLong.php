<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CorrespondanceNomLongRepository")
 */
class CorrespondanceNomLong
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    private $id;
     /**
     * @ORM\Column(name ="nom_long", type="string",length=200)
     */
    private $nomLong;
     /**
     * @ORM\Column(name ="nom_court", type="string",length=200)
     */
    private $nomCourt;
    // GETTER
    function getId ()
    {
        return $this->id;
    }
    function getNomLong ()
    {
        return $this->nomLong;
    }
    function getNomCourt ()
    {
        return $this->nomCourt;
    }

}
