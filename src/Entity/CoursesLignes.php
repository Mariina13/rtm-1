<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoursesLignesRepository")
 */
class CoursesLignes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_courses",type="integer")
     */
    private $idCourses;
    /**
     * @ORM\Column(name ="id_lignes", type="integer", length=200)
     */
    private $idLignes;
    // GETTER
    function getIdCourses ()
    {
        return $this->idCourses;
    }
    function getIdLignes ()
    {
        return $this->idLignes;
    }
}
