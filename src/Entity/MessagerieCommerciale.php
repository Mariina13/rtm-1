<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MessagerieCommercialeRepository")
 */
class MessagerieCommerciale
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id",type="integer")
     */
    private $id;
    /**
    * @ORM\Column(name ="id_stations", type="integer", length=200)
    */
    private $idStations;
    /**
    * @ORM\Column(name ="id_interne", type="integer", length=200)
    */
    private $idInterne;
    /**
    * @ORM\Column(name ="id_calcule", type="integer", length=200)
    */
    private $idCalcule;
    /**
    * @ORM\Column(name ="texte", type="string", length=200)
    */
    private $texte;
    /**
    * @ORM\Column(name ="validite", type="datetime")
    */
    private $validite;
    /**
    * @ORM\Column(name ="idfichier_tts", type="integer", length=200)
    */
    private $idFichierTts;
    /**
    * @ORM\Column(name ="date_envoi", type="datetime")
    */
    private $dateEnvoi;
    /**
    * @ORM\Column(name ="message_envoye", type="string", length=200)
    */
    private $messageEnvoye;
    /**
    * @ORM\Column(name ="date_annulation", type="datetime")
    */
    private $dateAnnulation;
    /**
    * @ORM\Column(name ="message_annule", type="string", length=200)
    */
    private $messageAnnule;
    /**
    * @ORM\Column(name ="type_messagerie", type="string", length=200)
    */
    private $TypeMessagerie;



    //SETTER

    /*public function setDateEnvoi ($dateEnvoi)
    {
        // ON DOIT CREER UN OBJET DATETIME A PARTIR
        // http://php.net/manual/fr/datetime.createfromformat.php
        $this->date_envoi = \DateTime::createfromformat("Y-m-d H:i:s", $dateEnvoi);
    }
    public function setDateModification ($dateModification)
    {
        // ON DOIT CREER UN OBJET DATETIME A PARTIR
        // http://php.net/manual/fr/datetime.createfromformat.php
        $this->dateModification = \DateTime::createfromformat("Y-m-d H:i:s", $dateModification);
    }
    public function setDateAnnulation ($dateAnnulation)
    {
        // ON DOIT CREER UN OBJET DATETIME A PARTIR
        // http://php.net/manual/fr/datetime.createfromformat.php
        $this->date_annulation = \DateTime::createfromformat("Y-m-d H:i:s", $dateAnnulation);
    }*/

    // GETTER

    public function getId()
    {
        return $this->id;
    }
    public function getIdStations()
    {
        return $this->idStations;
    }
    public function getIdInterne()
    {
        return $this->idInterne;
    }
    public function getIdCalcule()
    {
        return $this->idCalcule;
    }
    public function getTexte()
    {
        return $this->texte;
    }
    public function getValidite($format)
    {
        return $this->validite->format($format);
    }
    public function getIdFicherTts()
    {
        return $this->idFichierTts;
    }
    public function getMessageEnvoye()
    {
        return $this->messageEnvoye;
    }
    public function getDateEnvoi($format)
    {
        return $this->dateEnvoi->format($format);
    }
    public function getDateAnnulation($format)
    {
        return $this->dateAnnulation->format($format);
    }
    public function getMessageAnnule()
    {
        return $this->messageAnnule;
    }
    public function getTypeMessagerie()
    {
        return $this->typeMessagerie;
    }

}
