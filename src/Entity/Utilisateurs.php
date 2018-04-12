<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateursRepository")
 */
class Utilisateurs
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id", type="integer")
    */
    private $idUser;
    /**
     * @ORM\Column(name="niveau", type="integer", length=200)
     */
    private $niveau;
    /**
     * @ORM\Column(name="nom", type="string", length=200)
     */
    private $nom;
    /**
     * @ORM\Column(name="prenom", type="string", length=200)
     */
    private $prenom;
    /**
     * @ORM\Column(name="user", type="string", length=200)
     */
    private $user;
    /**
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;
    /**
    * @ORM\Column(name="heure_connexion", type="datetime")
    */
    private $heureConnexion ;
    /**
    * @ORM\Column(name="heure_deconnexion", type="datetime")
    */
    private $heureDeconnexion;
    /**
    * @ORM\Column(name="dateInscription", type="datetime")
    */
    private $dateInscription;
    /**
    * @ORM\Column(name="dateModification", type="datetime")
    */
    private $dateModification;

    //SETTER

    public function setId($idUser)
    {
        $this->id = $idUser;
    }
     public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }
    
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setUser ($user)
    {
        $this->user = $user;
    }
    
    public function setPassword ($password)
    {
        $this->password = $password;
    }


    public function setHeureConnexion ($heureConnexion)
    {
        // ON DOIT CREER UN OBJET DATETIME A PARTIR
        // http://php.net/manual/fr/datetime.createfromformat.php
        $this->heure_connexion = \DateTime::createfromformat("Y-m-d H:i:s", $heureConnexion);
    }
 
    public function setHeureDeconnexion ($heureDeconnexion)
    {
        // ON DOIT CREER UN OBJET DATETIME A PARTIR
        // http://php.net/manual/fr/datetime.createfromformat.php
        $this->heure_deconnexion = \DateTime::createfromformat("Y-m-d H:i:s", $heureDeconnexion);
    }
    public function setDateInscription ($dateInscription)
    {
        // ON DOIT CREER UN OBJET DATETIME A PARTIR
        // http://php.net/manual/fr/datetime.createfromformat.php
        $this->dateInscription = \DateTime::createfromformat("Y-m-d H:i:s", $dateInscription);
    }
    public function setDateModification ($dateModification)
    {
        // ON DOIT CREER UN OBJET DATETIME A PARTIR
        // http://php.net/manual/fr/datetime.createfromformat.php
        $this->dateModification = \DateTime::createfromformat("Y-m-d H:i:s", $dateModification);
    }

    
    // GETTER
    public function getId()
    {
        return $this->idUser;
    }

    public function getNiveau()
    {
        return $this->niveau;
    }
    
     public function getNom ()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
      public function getUser ()
    {
       return $this->user;
    }
    public function getPassword ()
    {
        return $this->password;
    }

    public function getHeureConnexion ($format)
    {
        return $this->heureConnexion->format($format);
    }
    
     public function getHeureDeconnexion ($format)
    {
        return $this->heureDeconnexion->format($format);
    }
    
    public function getDateInscription ($format)
    {
        return $this->dateInscription->format($format);
    }
    
    public function getDateModifiction ($format)
    {
        return $this->dateModification->format($format);
    }
   
   
}
