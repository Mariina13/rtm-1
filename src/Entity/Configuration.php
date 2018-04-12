<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConfigurationRepository")
 */
class Configuration
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    private $id;
    /**
     * @ORM\Column(name ="mode", type="integer",length=200)
     */ 
    private $mode;
     /**
     * @ORM\Column(name ="use_sitetra_dll", type="integer",length=200)
     */
    private $useSiteTetraDll;
     /**
     * @ORM\Column(name ="arret_application", type="datetime")
     */
    private $arretApplication;
     /**
     * @ORM\Column(name ="dossier_datas", type="string",length=200)
     */
    private $dossierDatas;
     /**
     * @ORM\Column(name ="affichage_message-box", type="string",length=200)
     */
    private $affichageMessageBox;
    
    // GETTER
    function getId ()
    {
        return $this->id;
    }
    function getMode ()
    {
        return $this->mode;
    }
    function getUseSiteTetraDll ()
    {
        return $this->useSiteTetraDll;
    }
    function getArretApplication ()
    {
        return $this->arretApllication;
    }
    function getDossierDatas ()
    {
        return $this->dossierDatas;
    }
    function getAffichageMessageBox ()
    {
        return $this->affichageMessageBox;
    }
}
