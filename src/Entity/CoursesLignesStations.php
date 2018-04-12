<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoursesLignesStationsRepository")
 */
class CoursesLignesStations
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
    /**
     * @ORM\Column(name ="id_stations", type="integer", length=200)
     */
    private $idStations;
    /**
     * @ORM\Column(name ="horaire_depart_theorique", type="datetime")
     */
    private $horaireDepartTheorique;
    /**
     * @ORM\Column(name ="horaire_arrivee_theorique", type="datetime")
     */
    private $horaireArriveeTheorique;
    /**
     * @ORM\Column(name ="horaire_depart_arrondi", type="datetime")
     */
    private $horaireDepartArrondi;
    /**
     * @ORM\Column(name ="horaire_arrivee_arrondi", type="datetime")
     */
    private $horaireArriveeArrondi;
    /**
     * @ORM\Column(name ="delta_depart_theorique", type="integer", length=200)
     */
    private $deltaDepartTheorique;
    /**
     * @ORM\Column(name ="delta_arrivee_theorique", type="integer", length=200)
     */
    private $deltaArriveeTheorique;
    /**
     * @ORM\Column(name ="rang_station_course", type="integer", length=200)
     */
    private $rangStationCourse;


    // GETTERS
    public function getIdCourses ()
    {
        return $this->idCourses;
    }

    public function getIdLignes ()
    {
        return $this->idLignes;
    }
    
    public function getIdStations ()
    {
        return $this->idStations;
    }
    
    public function getHoraireDepartTheorique()
    {
        return $this->horaireDepartTheorique->format($format);
    }
    public function getHoraireArriveeTheorique ($format)
    {
    return $this->horaireArriveeTheorique->format($format);
    }
    
    public function getHoraireDepartArrondi ($format)
    {
        return $this->horaireDepartArrondi->format($format);
    }

    public function getDeltaDepartTheorique($format) 
    {
        
        return $this->deltaDepartTheorique->format($format);
    }
    public function getDeltaArriveeTheorique ()
    {
        return $this->deltaArriveeTheorique;
    }
    public function getRangStationCourse ()
    {
        return $this->rangStationCourse;
    }

}
