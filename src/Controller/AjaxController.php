<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

//namespace App\Entity\Bornes;
//namespace App\Entity\TableEtatSysteme;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AjaxController
    extends Controller


{
    /**
    * @Route("/ajax", name="ajax")
    */   
    public function ajax (Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
    {

        ob_start();
    
        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER rtm-1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminPart/ajax.php");

            $contenuCache = ob_get_clean();
            
            return new Response($contenuCache);
    }
    /**
    * @Route("/ajax1", name="ajax1")
    */   
    public function ajax1 (Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
    {

        ob_start();
    
        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER rtm-1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminPart/ajax1.php");

            $contenuCache = ob_get_clean();
            
            return new Response($contenuCache);
    }
    /**
    * @Route("/ajax2", name="ajax2")
    */   
    public function ajax2 (Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
    {

        ob_start();
    
        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER rtm-1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminPart/ajax2.php");

            $contenuCache = ob_get_clean();
            
            return new Response($contenuCache);
    }
    /**
    * @Route("/ajax3", name="ajax3")
    */   
    public function ajax3 (Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
    {

        ob_start();
    
        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER rtm-1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminPart/ajax3.php");

            $contenuCache = ob_get_clean();
            
            return new Response($contenuCache);
    }
          
}