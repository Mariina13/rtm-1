<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoursesSpotiRepository")
 */
class CoursesSpoti
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name ="nomCourseSpoti", type="integer", length=200)
     */
    private $nomCourseSpoti;
    /**
     * @ORM\Column(name ="jourEploitation", type="integer", length=200)
     */
    private $jourExploitation;


    // GETTER
    
    public function getId ()
    {
        return $this->id;
    }
     public function getNomCourseSpoti ()
    {
        return $this->nomCourseSpoti;
    }
    public function getJourExploitation()
    {
        return $this->jourExploitation;
    }

}
