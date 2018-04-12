<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnnulationCourseRepository")
 */
class AnnulationCourse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name ="id", type="integer")
     */

    private $id;
    /**
     * @ORM\Column(name ="date_annulation", type="datetime")
     */
    private $dateAnnulation;
     /**
     * @ORM\Column(name ="itemRef", type="string", length=200)
     */
    private $itemRef;
     /**
     * @ORM\Column(name ="nomPtReseau", type="string", length=200)
     */
    private $nomPtReseau;
     /**
     * @ORM\Column(name ="nomLigneCial", type="string", length=200)
     */
    private $nomLigneCial;
     /**
     * @ORM\Column(name ="lastEventDate", type="datetime")
     */
    private $lastEventDate;
     // GETTER
    function getId ()
    {
        return $this->id;
    }
    function getDateAnnulation ()
    {
        return $this->dateAnnultion->format($format);
    }
    function getItemRef ()
    {
        return $this->itemRef;
    }
    function getNomPtReseau ()
    {
        return $this->nomPtReseau;
    }
    function getNomLigneCial ()
    {
        return $this->nomLigneCial;
    }
    function getLastEventDate ()
    {
        return $this->lastEventDate->format($format);
    }
}
